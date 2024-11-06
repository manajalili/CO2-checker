<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [CountryController::class, 'getResponseFromApi']);
