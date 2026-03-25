<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Route as RoutingRoute;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bienvenida/{nombre}', function ($nombre) {
    return "<h1>Bienvenido a mi pagina, hola $nombre, como estas?</h1>";
});
