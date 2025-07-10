<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test/revai', function () {
    return view('testing.rev-sales-chat-assistant');
});

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register/solo', function () {
    return view('auth.register-solo');
})->name('register.solo');

Route::post('/register/solo', [AuthController::class, 'registerSolo'])->name('register.solo.post');

Route::get('/register/company', function () {
    return view('auth.register-company');
})->name('register.company');

Route::post('/register/company', [AuthController::class, 'registerCompany'])->name('register.company.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
