<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\HomeController;


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

Route::get('home',[HomeController::class,'index']);

route::get('AgregarProducto',[ProductoController::class,'AgregarPro']);

route::get('DetalleProducto/{id}',[ProductoController::class,'DetalleProducto']);

Route::get('DetalleCompra/{id}',[CompraController::class,'DetalleCompra']);

Route::get('HistorialCompra',[CompraController::class,'HistorialCompra']);

Route::get('EditarProducto/{id}',[ProductoController::class,'EditarProducto']);
