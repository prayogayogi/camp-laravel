<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/success_checkout', function () {
    return view('success_checkout');
})->name('success_checkout');

// Socialite route
Route::get('sign-to-google', [UserController::class, 'google'])->name('sign.to.google');
Route::get('auth/google/callback', [UserController::class, 'handeleProviderCallback'])->name('user.google.callback');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
