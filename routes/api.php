<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\PlatilloController;
use App\Http\Controllers\Api\OrdenController;
use App\Http\Controllers\Api\OrdenDetalleController;

Route::apiResource('categorias', CategoriaController::class);

Route::apiResource('platillos', PlatilloController::class);

Route::apiResource('ordenes', OrdenController::class);

Route::apiResource('orden-detalles', OrdenDetalleController::class);