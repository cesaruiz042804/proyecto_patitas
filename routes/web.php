<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginacionController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FormCitasController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\QuestionsController;
use App\Http\Middleware\SessionMiddleware;
use App\Http\Middleware\SessionAdminMiddleware;

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

// Ruta para a la parte de preguntas
Route::post('/sobre-nosotros/preguntas', [QuestionsController::class, 'call_questions'])->name('form.questions');

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

// Rutas para la parte del admin - Login 
Route::get('/admin/login-session', [AdminController::class, 'call_admin_login_session'])->name('admin.login.session');
Route::post('/admin/session', [AdminController::class, 'call_admin_session'])->name('admin.session');
Route::get('/admin/login-logout', [AdminController::class, 'call_admin_logout'])->name('admin.logout');

// Rutas para la parte del admin - Dashboard - Calendar - Estado de citas
Route::get('/admin/dashboard', [AdminController::class, 'call_admin_dashboard'])->name('admin.dashboard')->middleware(SessionAdminMiddleware::class);
Route::get('/admin/users/datatables', [AdminController::class, 'call_admin_datatables'])->name('admin.datatables.users')->middleware(SessionAdminMiddleware::class);
Route::get('/admin/products', [AdminController::class, 'call_admin_form_products'])->name('admin.form.products')->middleware(SessionAdminMiddleware::class);
Route::get('/admin/appointments/assign', [AdminController::class, 'call_admin_appointment'])->name('admin.appointment')->middleware(SessionAdminMiddleware::class);
Route::get('/admin/appointments/status', [AdminController::class, 'call_admin_status_medical'])->name('admin.status.medical')->middleware(SessionAdminMiddleware::class);
Route::post('/admin/appointments/assign', [AdminController::class, 'call_admin_appointment_submit'])->name('admin.appointment.submit')->middleware(SessionAdminMiddleware::class);
Route::post('/admin/appointments/status/update', [AdminController::class, 'call_update_status_appointment'])->name('update.status.appointment')->middleware(SessionAdminMiddleware::class);

// Rutas para la parte del admin del carrito de compra
Route::get('/admin-cart-add', [AdminProductsController::class, 'call_admin_cart_add'])->name('admin.cart.add');
Route::post('/admin-cart-add-product', [AdminProductsController::class, 'call_admin_cart_add_product'])->name('admin.cart.add.product');
Route::post('/admin-cart-delete-product', [AdminProductsController::class, 'call_admin_cart_delete_product'])->name('admin.cart.delete.product');



# git add .
# git commit -m "Escribir"
# git push origin main o master

# php artisan migrate:reset
# php artisan migrate


# Comandos artisan
# php artisan make:seeder UsersTableSeeder
# php artisan db:seed --class=UsersTableSeeder      Uno solo
# php artisan db:seed     Todos
# php artisan migrate:refresh --seed
# php artisan make:controller UsersController
# php artisan make:model User
# php artisan make:migration UsersTable
# php artisan migrate:refresh






