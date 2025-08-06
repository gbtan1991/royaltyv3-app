<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/login', function(){
    return redirect()->route('admin.login');
})->name('login');


Route::get('/', [DashboardController::class, 'index'])
->middleware('auth:admin')
->name('dashboard');




require __DIR__.'/admin/auth.php';