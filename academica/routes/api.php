<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\CancionController;

Route::apiResource('artistas', ArtistaController::class);
Route::apiResource('canciones', CancionController::class);
