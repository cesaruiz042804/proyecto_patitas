<?php

namespace App\Http\Controllers;

use App\Models\table_cita;
use App\Models\table_dato_mascota;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use \App\Mail\EmailCitaMedica;

class FormCitasController extends Controller
{
    public function call_register_citas(Request $request)
    {
        try {

            $validatedData = $request->validate(
                [
                    'user' => 'required|numeric',
                    'petName' => 'required|string|max:255',
                    'species' => 'required|string|max:255',
                    'breed' => 'required|string|max:255',
                    'weight' => 'required|numeric|min:0|max:300',
                    'color' => 'required|string|max:255',
                    'old' => 'required|integer|min:0|max:30',
                    'consultation' => 'required|string|max:255',
                    'time_start' => 'required|string',
                    'time_end' => 'required|string',
                ],
                [
                    'user' => 'El ID no se ha encontrado.',
                    'petName.required' => 'El nombre de la mascota es obligatorio.',
                    'petName.string' => 'El nombre de la mascota debe ser un texto.',
                    'species.required' => 'Debes seleccionar una especie.',
                    'breed.required' => 'Debes seleccionar una raza.',
                    'weight.required' => 'El peso es obligatorio.',
                    'weight.min' => 'El peso debe ser mayor o igual a 0.',
                    'weight.max' => 'El peso no puede exceder los 300 kg.',
                    'color.required' => 'El color es obligatorio.',
                    'old.required' => 'La edad es obligatoria.',
                    'old.integer' => 'La edad debe ser un número entero.',
                    'old.max' => 'La edad no puede ser mayor a 30 años.',
                    'consultation.required' => 'El motivo de la consulta es obligatorio.',
                    'time_start.required' => 'La fecha es obligatoria.',
                    'time_end.required' => 'La hora es obligatoria.',
                ]
            );

            // Convertir fecha a Y-m-d
            //$dateConvert = Carbon::createFromFormat('Y-m-d', $validatedData['date'])->format('Y-m-d');

            Log::debug(session('user'));


            $data = \App\Models\table_user::find($validatedData['user']); // Busca si el usuario existe
            $cont = \App\Models\table_cita::count(); // Busca la cantidad total de registros

            if ($data) {
                // Crear la instancia del modelo para la cita
                $cita = table_cita::create([
                    'user_id' => $validatedData['user'],
                    'consultation' => $validatedData['consultation'],
                    'event' => 'Cita #' . strval($cont + 1),
                    'start_date' => $validatedData['time_start'],
                    'end_date' => $validatedData['time_end'],
                ]);

                // Crear la instancia del modelo para la mascota
                $mascota = table_dato_mascota::create([
                    'user_id' => $validatedData['user'],
                    'nombre_mascota' => $validatedData['petName'],
                    'especie' => $validatedData['species'],
                    'raza' => $validatedData['breed'],
                    'peso' => $validatedData['weight'],
                    'color' => $validatedData['color'],
                    'edad' => $validatedData['old'],
                ]);

                Mail::to($data->email)->send(new EmailCitaMedica($mascota->nombre_mascota, $cita->start_date));
                Log::debug($mascota->nombre_mascota);
            } else {
                return redirect()->route('cita_medica')->with('message', 'Ocurrió un problema (debes estar logueado en la página')->with('partialsMessage', 'okno');
            }

            return redirect()->route('home')->with('message', 'La cita médica de tu mascota ha sido creada con éxito. ¡Gracias por confiar en nosotros para el cuidado de tu peludo amigo!')->with('partialsMessage', 'ok');;
        } catch (ValidationException $exception) {
            return redirect()->back()->withErrors($exception->errors())->withInput();
        }
    }
}


