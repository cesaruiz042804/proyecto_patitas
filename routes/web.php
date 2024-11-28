<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginacionController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FormCitasController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\SessionMiddleware;

Route::get('/', function () {
    return redirect()->route('home');
})->name('home'); // Página principal

Route::get('/home', function () {
    return view('home');
})->name('home');

// Paginacion para el nav
Route::get('/sobre-nosotros', [PaginacionController::class, 'call_sobre_nosotros'])->name('nosotros');
Route::get('/sobre-nosotros', [PaginacionController::class, 'call_about'])->name('about');
Route::get('/cita-medica', [PaginacionController::class, 'call_cita_medica'])->name('cita_medica')->middleware(SessionMiddleware::class);
Route::post('/registrar-cita-medica', [FormCitasController::class, 'call_register_citas'])->name('register.citas');
Route::get('/donacion', [PaginacionController::class, 'call_donation'])->name('donation');

// Rutas para login y creacion de cuenta
Route::get('/login', [PaginacionController::class, 'call_login'])->name('login');
Route::post('/login-session', [LoginController::class, 'call_login_session'])->name('login.session');
Route::post('/register', [LoginController::class, 'register'])->name('register');
Route::get('confirm-email/{token}', [LoginController::class, 'call_confirmEmail'])->name('confirm.email');
Route::get('/logout', [PaginacionController::class, 'call_logout'])->name('logout');
Route::post('/logout-session', [LoginController::class, 'call_logout_session'])->name('logout.session');

// Rutas para a la parte de los productos y el carrito
Route::get('/login', [PaginacionController::class, 'call_login'])->name('login');
Route::post('/login-session', [LoginController::class, 'call_login_session'])->name('login.session');
Route::post('/register', [LoginController::class, 'register'])->name('register');
Route::get('confirm-email/{token}', [LoginController::class, 'call_confirmEmail'])->name('confirm.email');
Route::get('/logout', [PaginacionController::class, 'call_logout'])->name('logout');
Route::post('/logout-session', [LoginController::class, 'call_logout_session'])->name('logout.session');

// Rutas para a la parte de los productos y el carrito
Route::get('/products', [CartController::class, 'viewProducts'])->name('products');
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show')->middleware(SessionMiddleware::class);
Route::delete('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [PaginacionController::class, 'call_checkout_paypal'])->name('checkout_paypal');
Route::get('/charge-checkout', [PaginacionController::class, 'call_payment_charge'])->name('charge_stripe');

Route::get('/payment/success', [PaypalController::class, 'call_success'])->name('paypal.success');
Route::get('/payment/notify', [PaypalController::class, 'call_notify'])->name('paypal.notify');
Route::get('/payment/cancel', [PaypalController::class, 'call_cancel'])->name('paypal.cancel');

Route::get('/payment/success/donation', [PaypalController::class, 'call_success_donation'])->name('paypal.success.donation');
Route::get('/payment/notify/donation', [PaypalController::class, 'call_notify_donation'])->name('paypal.notify.donation');
Route::get('/payment/cancel/donation', [PaypalController::class, 'call_cancel_donation'])->name('paypal.cancel.donation');
//Route::post('/payment/webhook', [PaypalController::class, 'webhook']);

// Rutas para la parte de los productos
Route::get('/admin-login-session', [AdminController::class, 'call_admin_login_session'])->name('admin.login.session');
Route::post('/admin-login-session', [AdminController::class, 'call_admin_session'])->name('admin.session');



# git add .
# git commit -m "Escribir"
# git push origin main o master

# php artisan migrate:reset
# php artisan migrate
