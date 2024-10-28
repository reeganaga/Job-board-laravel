<?php

use App\Http\Controllers\CareerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('careers.index');
});

Route::resource('careers', CareerController::class)->only(['index', 'show']);
