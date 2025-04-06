<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;

Route::get('/fetch-json-data', [ApiController::class, 'fetchJsonData']);

Route::get('/', function () {
    return to_route('login');
});

Route::get('/projects', [\App\Http\Controllers\ProjectController::class, 'index']);

// Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');

Route::get('/projects', [ProjectController::class, 'index'])->middleware('auth');

Route::post('/projects/create', [ProjectController::class, 'create']);

Route::get('/dashboard', function () {
    return 'Welcome to dashboard!';
})->middleware('auth');

use App\Http\Controllers\PasswordResetController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/forgot-password', [PasswordResetController::class, 'showForgot'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::match(['get', 'post'], '/projects/create', [ProjectController::class, 'create']);
