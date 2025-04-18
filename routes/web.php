<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\SupplementsController;
use App\Http\Controllers\Admin\ProgramsController;
use App\Http\Controllers\Admin\ExercisesController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\SupplementController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.users.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//testing route to view navbar and footer
Route::get('/nav', function () {
    return view('layout');
});

//routes for home, about-us, contatc-us, shop
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/about', function () {
    return view('about-us');
});
Route::get('/contact-us', function () {
    return view('contact-us');
});
Route::resource('supplements', SupplementController::class);


//route for admin nav
Route::prefix('Admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Full CRUD routes
    Route::resource('users', UserController::class);
    Route::resource('orders', OrdersController::class);
    Route::resource('supplements', SupplementsController::class);
    Route::resource('programs', ProgramsController::class);
    Route::resource('exercises', ExercisesController::class);

    // Index-only routes
    Route::get('messages', [MessagesController::class, 'index'])->name('messages.index');
    Route::get('statistics', [StatisticsController::class, 'index'])->name('statistics.index');
});

Route::get('/supplements', [SupplementController::class, 'index'])->name('supplements.index');
Route::get('/get-supplements', [SupplementController::class, 'getSupplements'])->name('supplements.get');
Route::get('/checkout', [CheckoutController::class, 'showCheckoutPage'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
    
