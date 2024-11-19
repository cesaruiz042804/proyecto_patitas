<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginacionController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FormCitasController;
use App\Http\Controllers\PaymentStripeController;
use App\Http\Middleware\SessionMiddleware;

Route::get('/', function () {
    return redirect()->route('home');
})->name('home'); // Página principal

Route::get('/home', function () {
    return view('home');
})->name('home');

<<<<<<< HEAD
// Paginacion para el nav
=======
<<<<<<< HEAD
// Paginacion para el nav
=======
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
>>>>>>> 51923894247a93a57e2907aaff37b1b93760fe7d
Route::get('/sobre-nosotros', [PaginacionController::class, 'call_sobre_nosotros'])->name('nosotros');
Route::get('/sobre-nosotros', [PaginacionController::class, 'call_about'])->name('about');
Route::get('/cita-medica', [PaginacionController::class, 'call_cita_medica'])->name('cita_medica')->middleware(SessionMiddleware::class);
Route::post('/registrar-cita-medica', [FormCitasController::class, 'call_register_citas'])->name('register.citas');
Route::get('/donacion', [PaginacionController::class, 'call_donation'])->name('donation');

<<<<<<< HEAD
// Rutas para login y creacion de cuenta
=======
<<<<<<< HEAD
// Rutas para login y creacion de cuenta
Route::get('/login', [PaginacionController::class, 'call_login'])->name('login');
Route::post('/login-session', [LoginController::class, 'call_login_session'])->name('login.session');
Route::post('/register', [LoginController::class, 'register'])->name('register');
Route::get('confirm-email/{token}', [LoginController::class, 'call_confirmEmail'])->name('confirm.email');
Route::get('/logout', [PaginacionController::class, 'call_logout'])->name('logout');
Route::post('/logout-session', [LoginController::class, 'call_logout_session'])->name('logout.session');

// Rutas para a la parte de los productos y el carrito
=======
>>>>>>> 51923894247a93a57e2907aaff37b1b93760fe7d
Route::get('/login', [PaginacionController::class, 'call_login'])->name('login');
Route::post('/login-session', [LoginController::class, 'call_login_session'])->name('login.session');
Route::post('/register', [LoginController::class, 'register'])->name('register');
Route::get('confirm-email/{token}', [LoginController::class, 'call_confirmEmail'])->name('confirm.email');
Route::get('/logout', [PaginacionController::class, 'call_logout'])->name('logout');
Route::post('/logout-session', [LoginController::class, 'call_logout_session'])->name('logout.session');

<<<<<<< HEAD
// Rutas para a la parte de los productos y el carrito
=======
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
>>>>>>> 51923894247a93a57e2907aaff37b1b93760fe7d
Route::get('/products', [CartController::class, 'viewProducts'])->name('products')->middleware(SessionMiddleware::class);
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::delete('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [PaginacionController::class, 'call_checkout_paypal'])->name('checkout_paypal');
Route::get('/charge-checkout', [PaginacionController::class, 'call_payment_charge'])->name('charge_stripe');

Route::get('/payment/success', [PaypalController::class, 'call_success'])->name('paypal.success');
Route::get('/payment/notify', [PaypalController::class, 'call_notify'])->name('paypal.notify');
Route::get('/payment/cancel', [PaypalController::class, 'call_cancel'])->name('paypal.cancel');

Route::get('/payment/success/donation', [PaypalController::class, 'call_success_donation'])->name('paypal.success.donation');
Route::get('/payment/notify/donation', [PaypalController::class, 'call_notify_donation'])->name('paypal.notify.donation');
Route::get('/payment/cancel/donation', [PaypalController::class, 'call_cancel_donation'])->name('paypal.cancel.donation');
Route::post('/payment/webhook', [PaypalController::class, 'webhook']);
















<<<<<<< HEAD


=======
<<<<<<< HEAD


=======
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
>>>>>>> 51923894247a93a57e2907aaff37b1b93760fe7d
