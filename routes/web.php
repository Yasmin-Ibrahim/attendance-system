<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\StudentController;


Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('admins', [AdminController::class, 'index'])->name('admin');
    Route::resource('students', StudentController::class);
    Route::resource('parents', ParentsController::class);
    Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances');

    Route::get('/scanner', [AttendanceController::class, 'scanner'])->name('scanner');
    Route::post('/scan-attendance', [AttendanceController::class, 'scan'])->name('scan');
});


Route::prefix('user/')->group(function(){
    Route::middleware('guest')->group(function(){
        Route::get('login', [AuthController::class, 'show_login'])->name('login');
        Route::get('register', [AuthController::class, 'show_register'])->name('register');

        Route::post('login', [AuthController::class, 'login'])->name('store.login');
        Route::post('register', [AuthController::class, 'register'])->name('store.register');
    });

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

