<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $user = $request->attributes->get('user');

        return view('cita_medica')->with('user', $user);
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

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
    public function call_blank()
    {
        return view('blank');
    }

>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
>>>>>>> 51923894247a93a57e2907aaff37b1b93760fe7d
    public function call_checkout_paypal() 
    {
        return view('payment_paypal');
    }

}
