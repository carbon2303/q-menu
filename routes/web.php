
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba-relaciones', [
    CategoriaController::class,
    'mostrarCategorias'
]);
