<?php

use App\Http\Controllers\CareerController;
use Illuminate\Support\Facades\Route;

Route::resource('careers', CareerController::class)->only(['index','show']);
