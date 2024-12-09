<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\table_question;

class QuestionsController extends Controller
{
    public function call_questions(Request $request)
    {
        try {

            $validatedData = $request->validate(
                [
                    'name' => 'required|string',
                    'email' => 'required|string|email',
                    'phone' => 'required|string',
                    'type_message' => 'required|string',
                    'message' => 'nullable|string',
                ],
                [
                    'name.required' => 'El nombre completo es obligatorio.',
                    'email.required' => 'El correo electrónico.',
                    'phone.required' => 'El número de celular es obligatorio.',
                    'type_message.required' => 'Por favor, selecciona una opción válida.',
                ]
            );

            // Crear la instancia del modelo question
            $one_question = table_question::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'type_message' => $validatedData['type_message'],
                'message' => $validatedData['message'],
            ]);

            return redirect()->route('about')->with('message', 'Tu pregunta ha sido enviada con éxito. Si tienes más dudas, no dudes en enviarnos otra consulta.')->with('partialsMessage', 'ok');;
        } catch (ValidationException $exception) {
            return redirect()->back()->withErrors($exception->errors())->withInput();
        }
    }
}
