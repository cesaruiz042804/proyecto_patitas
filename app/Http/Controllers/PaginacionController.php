<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class PaginacionController extends Controller
{
    public function call_home()
    {
        return view('home');
    }

    public function call_about()
    {
        return view('about');
    }

    public function call_cita_medica(Request $request)
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

        $user = $request->attributes->get('user');

        return view('cita_medica', compact('events'))->with('user', $user);
    }

    public function call_donacion()
    {
        return view('donacion');
    }

    public function call_donation()
    {
        return view('donation');
    }

    public function call_login()
    {
        return view('login');
    }

    public function call_logout()
    {
        return view('logout');
    }

    public function call_checkout_paypal()
    {
        return view('payment_paypal');
    }

    public function call_calendar()
    {
        $alls_events = Event::all();
        $events = [];

        foreach ($alls_events as $event) {
            $events[] = [
                'title' => $event->start_date,
                'start' => $event->end_date,
                'end' => $event->event,
            ];
        }

        return view('payment_paypal', compact('events'));
    }
}
