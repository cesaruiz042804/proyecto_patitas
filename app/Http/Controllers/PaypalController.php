<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaypalController extends Controller
{

  public function webhook(Request $request)
  {
    return redirect()->route('home');
    return response('Webhook recibido', 200);
  }

  public function call_success()
  {
    session()->forget('cart');
    return redirect()->route('home')->with('message', '¡El pago se ha realizado correctamente y el carrito ha sido vaciado!');
  }

  public function call_notify()
  {
    return view('home');
  }

  public function call_cancel()
  {
    return view('cart');
  }

  public function call_success_donation()
  {
    return redirect()->route('home')->with('message', '¡Gracias por tu ayuda!');
  }

  public function call_notify_donation()
  {
    return view('home');
  }

  public function call_cancel_donation()
  {
    return view('donation');
  }
}
