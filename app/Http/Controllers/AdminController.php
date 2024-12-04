<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\table_admin_user;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;

use App\Models\Event;
use App\Models\table_user;
use App\Models\table_cita;
use App\Models\table_dato_mascota;
use Illuminate\Support\Facades\Mail;
use \App\Mail\EmailAppointment;

class AdminController extends Controller
{
    public function call_admin_login_session()
    {
        return view('admin.login');
    }

    public function call_admin_session(Request $request) // Controlador para la parte de inicio de sesion de admin
    {
        // Validar las credenciales
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ],  [
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'password.required' => 'El campo de contraseña es obligatorio.',
        ]);

        // Buscar el usuario por correo electrónico
        $user = table_admin_user::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Credenciales correctas: Almacena el ID del usuario en la sesión
            session(['admin_user' => $user->id]);
            return view('admin.home')->with('partialsMessage', 'ok')->with('message', 'Has iniciado sesión correctamente.');
        } else {
            // Credenciales incorrectas
            return back()->withErrors(['email' => 'Las credenciales son incorrectas.']);
        }
    }

    public function call_admin_datatables()
    {
        $users = table_user::all(); // Obtener todos los productos
        return view('admin.datatables', compact('users'));
    }

    public function call_admin_dashboard()
    {
        return view('admin.dashboard');
    }

    public function call_admin_form_products() // 
    {
        $products = Product::all(); // Obtener todos los productos
        return view('admin.form_products', compact('products'));
    }

    /*
    public function call_admin_appointment()
    {
        $alls_events = Event::all();
        $events = [];

        foreach ($alls_events as $event) {
            $events[] = [
                'title' => $event->event,
                'start' => $event->start_date,
                'end' => $event->end_date,
            ];
        }

        return view('admin.appointment', compact('events'));
    }
        */

    public function call_admin_status_medical() // Mostrar informacion de las citas
    {
        $citas = table_cita::with(['mascota', 'mascota.user'])->get();

        // Organizar los datos para la vista
        $data = [];
        foreach ($citas as $cita) {
            $data[] = [
                'email' => $cita->mascota->user->email, // Email del dueño
                'nombre' => $cita->mascota->user->nombre . ' ' . $cita->mascota->user->apellido, // Nombre del dueño
                'cedula' => $cita->mascota->user->cedula, // Nombre de la mascota
                'consulta' => $cita->consultation, // Motivo de la consulta
                'telefono' => $cita->mascota->user->telefono, // Teléfono del dueño
                'mascota' => $cita->mascota->nombre_mascota, // Nombre de la mascota
                'especie' => $cita->mascota->especie, // Nombre de la mascota
                'raza' => $cita->mascota->raza, // Nombre de la mascota
                'peso' => $cita->mascota->peso, // Nombre de la mascota
                'color' => $cita->mascota->color, // Nombre de la mascota
                'edad' => $cita->mascota->edad, // Nombre de la mascota
                'status' => $cita->status, // Nombre de la mascota
                'id_appointment' => $cita->id, // Nombre de la mascota
            ];
        }

        return view('admin.status_medical', compact('data'));
    }

    public function call_admin_appointment_submit(Request $request) // Guardar los datos de la cita despues de su asignacion
    {
        try {

            $validatedData = $request->validate(
                [
                    'id_appointment' => 'required|numeric',
                    'email' => 'required|email',
                    'owner' => 'required|string',
                    'pets' => 'required|string',
                    'startDate' => 'required|string',
                    'finalDate' => 'required|string',
                ],
                [
                    'id_appointment.required' => 'El ID de cita no se ha encontrado.',
                    'email.required' => 'El correo no se ha encontrado.',
                    'email.email' => 'El correo es inválido.',
                    'owner.required' => 'El nombre del dueño responsable no se ha encontrado.',
                    'pets.required' => 'El nombre de la mascota no se ha encontrado.',
                    'startDate.required' => 'La fecha es obligatoria.',
                    'finalDate.required' => 'La hora es obligatoria.',
                ]
            );

            $cita = table_cita::where('id', $validatedData['id_appointment'])->first();

            if ($cita) {
                // Si el registro existe, actualiza los campos
                $cita->update([
                    'event' => 'Cita #' . strval($validatedData['id_appointment']),
                    'start_date' => $validatedData['startDate'],
                    'end_date' => $validatedData['finalDate'],
                    'status' => 'In Progress',
                ]);

                Mail::to($validatedData['email'])->send(new EmailAppointment($validatedData['owner'], $validatedData['pets'], $validatedData['startDate']));
            } else {
                return redirect()->route('admin.status.medical')->with('message', 'Ocurrió un problema en la asignación de la cita médica.')->with('partialsMessage', 'okno');
            }

            return redirect()->route('admin.status.medical')->with('message', 'La cita médica de ' . $validatedData['owner'] . ' ha sido asignada con éxito.')->with('partialsMessage', 'ok');
        } catch (ValidationException $exception) {
            return redirect()->back()->withErrors($exception->errors())->withInput();
        }
    }

    public function call_update_status_appointment(Request $request) // Controlador para la vista de asignar cita a calendario
    {

        try {
            $formData = $request->all();

            // Obtener todos los eventos
            $alls_events = table_cita::all();

            // Inicializar el array de eventos
            $events = [];

            // Llenar el array de eventos con la información obtenida
            foreach ($alls_events as $event) {
                $events[] = [
                    'title' => $event->event,
                    'start' => $event->start_date,
                    'end' => $event->end_date,
                ];
            }

            return view('admin.appointment', compact('events', 'formData'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Hubo un error al obtener los eventos.');
        }
    }
}
