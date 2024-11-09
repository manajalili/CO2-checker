<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IntensityController;

Route::get('/', [IntensityController::class, 'getResponseFromApi']);
