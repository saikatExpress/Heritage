<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\DashboardController;
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

// Handle logout request
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('properties.show');
Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');

Route::middleware('auth')->group(function () {
    Route::get('/admin-dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/bidder-dashboard', function () {
        return view('bidder.dashboard');
    })->name('bidder.dashboard');

    Route::get('/owner-dashboard', function () {
        return view('property_owner.dashboard');
    })->name('owner.dashboard');
});

