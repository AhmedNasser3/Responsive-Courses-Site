<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\AdminRegisterController;

Route::prefix('admin')->middleware('guest:admin')->group(function () {
    // ======================= Register =======================
    Route::get('register', [AdminRegisterController::class, 'create'])->name('admin.register');
    Route::post('register', [AdminRegisterController::class, 'store']);
    // ======================= End Register =======================

    // ======================= Login =======================
    Route::get('login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [LoginController::class, 'store']);
    // ======================= End Login =======================
});



Route::prefix('admin')->middleware('auth:admin')->group(function () {
    // ======================= Admin Dashboard =======================
    Route::get('/dashboard', function () {
        return view('Admin.dashboard');
    })->name('admin.dashboard');
    //  ======================= End Dashboard =======================


    // ======================= LogOut =======================
    Route::post('logout', [LoginController::class, 'destroy'])
                ->name('admin.logout');
    // ======================= End LogOut =======================


});
