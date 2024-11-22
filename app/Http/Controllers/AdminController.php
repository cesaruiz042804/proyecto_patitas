<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\table_admin_user;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function call_admin_login_session()
    {
        return view('admin.login');
    }

    public function call_admin_session(Request $request)
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
}
