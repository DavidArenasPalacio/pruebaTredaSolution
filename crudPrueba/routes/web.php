<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TiendaController;
use App\Models\Tienda;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/tienda', TiendaController::class);

Route::resource('/producto', ProductoController::class);