<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


// Routes requiring authentication
Route::middleware('auth')->group(function () {
   
    Route::get('/', function () {
        if (auth()->check()) {
            if (auth()->user()->role === 'teacher') {
                return view('pages.teacher_dashboard');
            } elseif (auth()->user()->role === 'student') {
                return view('pages.student_dashboard');
            } else {
                abort(403, 'Unauthorized'); 
            }
        }
    
        return redirect()->route('login'); 
    })->name('home');
    
    Route::post('/logout', function () {
        $previousUrl = url()->previous();

        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect($previousUrl ?? route('pages.teacher_dashboard'));
    })->name('logout');
});

// Auth Routes using Breeze
Route::middleware('guest')->group(function () {

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

