<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CareerApplicationController;
use App\Http\Controllers\CareerController;
use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return to_route('careers.index');
});

Route::get('login', fn() => to_route('auth.create'))->name('login');

Route::resource('careers', CareerController::class)->only(['index', 'show']);

Route::resource('auth', AuthController::class)->only(['create', 'store']);

Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');

Route::middleware('auth')->group(function () {
    Route::resource('careers.application', CareerApplicationController::class)->only('create', 'store');
});
