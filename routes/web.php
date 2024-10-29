<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CareerController;
use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return to_route('careers.index');
});

Route::get('login', fn()=> to_route('Auth.create'))->name('login');

Route::resource('careers', CareerController::class)->only(['index', 'show']);

Route::resource('Auth', AuthController::class)->only(['create','store']);
