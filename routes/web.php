<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('properties', PropertyController::class);
Route::get('team', [TeamController::class, 'index']);
Route::get('testimonials', [TestimonialController::class, 'index']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');

// Handle registration request
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');

// Handle login request
Route::post('/login', [LoginController::class, 'login'])->name('login');



Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/admin-dashboard', 'index')->name('admin.dashboard');
    });

    Route::get('/bidder-dashboard', function () {
        return view('bidder.dashboard');
    })->name('bidder.dashboard');

    Route::get('/owner-dashboard', function () {
        return view('property_owner.dashboard');
    })->name('owner.dashboard');

    Route::controller(PropertyController::class)->group(function(){
        Route::get('/properties', 'index')->name('properties.index');
        Route::get('/properties/create', 'create')->name('properties.create');
        // Route::get('/properties/{id}', 'show')->name('properties.show');
        Route::post('/properties', 'store')->name('properties.store');
    });
});

Route::post('/properties/bid/{id}', [PropertyController::class, 'placeBid'])->middleware('auth');
// User Management Routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
});


// Handle logout request
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

