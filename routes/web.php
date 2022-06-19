<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\CheckoutController as AdminCheckout;

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

// Socialite route
Route::get('sign-to-google', [UserController::class, 'google'])->name('sign.to.google');
Route::get('auth/google/callback', [UserController::class, 'handeleProviderCallback'])->name('user.google.callback');

// Midtrans Routes
Route::get("payment/success", [UserController::class, "midtransCallback"]);
Route::post("payment/success", [UserController::class, "midtransCallback"]);

Route::middleware(["auth"])->group(function () {
    // Checkout route
    Route::middleware("ensureUserRole:user")->group(function () {
        Route::get("/checkout/success", [CheckoutController::class, "success"])->name("success_checkout");
        Route::get("/checkout/{camp:slug}", [CheckoutController::class, "create"])->name("checkout.create");
        Route::post("/checkout/{camp}", [CheckoutController::class, "store"])->name("checkout.store");
    });

    // dashboard
    Route::get("/dashboard", [HomeController::class, "dashboard"])->name("dashboard");

    // User dashboard
    Route::prefix("user/dashboard")->namespace("User")->name("user.")->middleware("ensureUserRole:user")->group(function () {
        Route::get("/", [UserDashboard::class, "index"])->name("dashboard");
    });

    // Admin dashboard
    Route::prefix("admin/dashboard")->namespace("Admin")->name("admin.")->middleware("ensureUserRole:admin")->group(function () {
        Route::get("/", [AdminDashboard::class, "index"])->name("dashboard");

        // Admin checkout
        Route::post("/checkout/{checkout}", [AdminCheckout::class, "update"])->name("checkout.update");
    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
