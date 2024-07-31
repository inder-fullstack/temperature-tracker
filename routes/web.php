<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemperatureController;

Route::get('/', [TemperatureController::class, 'index']);
