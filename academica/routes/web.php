<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Route as RoutingRoute;

// routes/web.php
Route::get('/{any}', function () {
    return view('dashboard');
})->where('any', '.*');