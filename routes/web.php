<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/recipes', [RecipesController::class, 'index']); //ver todos los datos
Route::get('/recipes/{id}', [RecipesController::class, 'show']); // obtener un dato en especifico
Route::get('/recipes/search/{name}', [RecipesController::class, 'search']); // buscar un dato
Route::post('/recipes', [RecipesController::class, 'store']); // agregar date
Route::put('/recipes/{id}', [RecipesController::class, 'update']); // actualizar dato
Route::delete('/recipes/{id}', [RecipesController::class, 'destroy']); // borrar dato