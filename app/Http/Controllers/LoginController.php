<?php

namespace App\Http\Controllers;

use App\Models\datos_users;
use App\Models\table_email_confirmation;
use App\Models\table_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use \App\Mail\ConfirmationEmail;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function register(Request $request)
    {

        try {

            $validatedData = $request->validate([ // Verifica si están llenas las casillas (son reglas que se ponen a las peticiones desde laravel)
                'email' => 'required|email|unique:table_users,email', // En unique, se pone el nombre de la tabla y el nombre de la columna donde se busca si existe el dato
                'name' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'id' => 'required|string|max:255|unique:table_users,cedula',
                'tel' => 'required|string|max:20',
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/[A-Z]/', // Al menos una letra mayúscula
                    'regex:/[a-z]/', // Al menos una letra minúscula
                    'regex:/[0-9]/', // Al menos un número
                    'regex:/[\W_]/', // Al menos un carácter especial
                ],
            ],  [
                'email.required' => 'El campo de correo electrónico es obligatorio.',
                'email.email' => 'El formato del correo electrónico es inválido.',
                'email.unique' => 'Este correo electrónico ya está en uso.',
                'name.required' => 'El campo nombre es obligatorio.',
                'lastname.required' => 'El campo apellido es obligatorio.',
                'id.required' => 'El campo cédula es obligatorio.',
                'id.unique' => 'Esta identificación se encuentra registrada.',
                'tel.required' => 'El campo teléfono es obligatorio.',
                'password.required' => 'El campo contraseña es obligatorio.',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
                'password.required' => 'La contraseña es obligatoria.',
                'password.regex' => 'La contraseña debe contener al menos una letra mayúscula, una letra minúscula, un número y un carácter especial.',
            ]);

            // Generar un token único
            $token = Str::random(60);

            // Crear el nuevo usuario
            $user = table_email_confirmation::create([
                'token' => $token,
                'email' => $validatedData['email'],
                'nombre' => $validatedData['name'], // name se convierte en nombre en la base de datos
                'apellido' => $validatedData['lastname'], // lastname se convierte en apellido
                'cedula' => $validatedData['id'], // id se convierte en cedula
                'telefono' => $validatedData['tel'], // tel se convierte en telefono
                'password' => Hash::make($validatedData['password']), // Encriptar la contraseña
            ]);
            
            //Log::debug($token);
            
            //Log::debug($token);

            Mail::to($user->email)->send(new ConfirmationEmail($token));
            //Mail::to('cesaruiz042804@gmail.com')->send(new ConfirmationEmail($token));

            return redirect()->route('login')->with('message', 'Te hemos enviado un correo para confirmar tu correo')->with('log', 'success')->with('partialMessage', 'ok');
        } catch (ValidationException $exception) {
            Log::debug("Catch 1 - exception");
            return redirect()->back()->withErrors($exception->errors())->withInput();
        }
    }

    
    public function call_confirmEmail($token)
    {

        if (empty($token)) {
            return redirect()->route('login')->with('message', 'El token es inválido o no se proporcionó.')->with('partialMessage', 'okno');
        }
        
        try {
            // Buscar el token en la base de datos
            $confirmation =  table_email_confirmation::where('token', $token)->first();

            if (!$confirmation) {
                return redirect()->route('login')->with(['message' => 'Token no válido.'])->with('partialMessage', 'okno');
                return redirect()->route('login')->with(['message' => 'Token no válido.'])->with('partialMessage', 'okno');
            }

            // Verificar si el token ha expirado (por ejemplo, 60 minutos)
            $expirationTime = 60; // minutos
            $createdAt = \Carbon\Carbon::parse($confirmation->created_at); // Obtener la fecha de creación
            if ($createdAt->addMinutes($expirationTime)->isPast()) {
                // Si ha pasado el tiempo de expiración
                return  redirect()->route('login')->with(['message' => 'El token ha expirado.'])->with('partialMessage', 'okno');
                return  redirect()->route('login')->with(['message' => 'El token ha expirado.'])->with('partialMessage', 'okno');
            }

            // Crear el usuario definitivo
            table_user::create([
                'email' => $confirmation->email,
                'nombre' => $confirmation->nombre,
                'apellido' => $confirmation->apellido,
                'cedula' => $confirmation->cedula,
                'telefono' => $confirmation->telefono,
                'password' => $confirmation->password, // Aquí ya está encriptada
            ]);

            // Eliminar el token de la base de datos
            table_email_confirmation::where('token', $token)->delete();

            return redirect()->route('home')->with(['message' => 'Cuenta confirmada con éxito.'])->with('partialMessage', 'ok');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('login')->with(['message' => 'Hubo un problema al procesar la solicitud.'])->with('partialMessage', 'okno');
            return redirect()->route('home')->with(['message' => 'Cuenta confirmada con éxito.'])->with('partialMessage', 'ok');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('login')->with(['message' => 'Hubo un problema al procesar la solicitud.'])->with('partialMessage', 'okno');
        }
    }

    public function call_login_session(Request $request)
    {
        // Validar las credenciales
        $request->validate([
            'email2' => 'required|email',
            'password' => 'required|string',
        ],  [
            'email2.required' => 'El campo de correo electrónico es obligatorio.',
            'password.required' => 'El campo de contraseña es obligatorio.',
        ]);

        // Buscar el usuario por correo electrónico
        $user = table_user::where('email', $request->email2)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Credenciales correctas: Almacena el ID del usuario en la sesión
            session(['user' => $user->id]);
            Log::debug(session('user'));
            $intendedUrl = session('intended_url', route('home')); // Cambia 'default.route' por la ruta que deseas por defecto
            session()->forget('intended_url'); // Eliminar la URL de la sesión
            return redirect($intendedUrl);
            //return redirect()->route('home'); // Redirigir a la página principal
        } else {
            // Credenciales incorrectas
            return back()->withErrors(['email2' => 'Las credenciales son incorrectas.']);
        }
    }

    public function call_logout_session()
    {
        Log::debug(session('user'));
        session()->forget('user'); // Eliminar el ID del usuario de la sesión
        Log::debug(session('cart'));
        session()->forget('cart'); // Eliminar el ID del usuario de la sesión

        return redirect()->route('home'); // Redirigir a la página de inicio de sesión
    }
}

/*
'email' => 'required|email|unique:table_users':

required: El campo email es obligatorio. Si no se envía, devolverá un error.
email: Verifica que el valor proporcionado sea una dirección de correo electrónico válida.
unique:table_users: Asegura que el correo electrónico sea único en la base de datos. Laravel buscará en la tabla table_users para verificar que no exista otro registro con el mismo correo electrónico.
'nombre' => 'required':

required: El campo nombre es obligatorio. Si el campo está vacío o no se envía, devolverá un error.


En Laravel, puedes personalizar los mensajes de error para las reglas de validación de una forma bastante sencilla sin necesidad de utilizar un bloque try-catch. Laravel tiene un sistema integrado para manejar las validaciones y mostrar mensajes de error personalizados.

php -S localhost:8000 -t public

*/