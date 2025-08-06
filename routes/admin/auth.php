<?php

use App\Http\Controllers\admin\AuthController;



Route::prefix("admin")->name("admin.")->group(function () {

    //Login
        Route::get("/login", [AuthController::class, 'index'])->name("login");
        Route::post("/login", [AuthController::class, 'login'])->name("login");

    //Logout
        Route::get("/logout", [AuthController::class, 'logout'])->name("logout");



});