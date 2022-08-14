<?php

// Check the controllers path
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\AuthController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Route::resource('categories', CategoriesController::class); // Incluye todas las rutas api de una operacion CRUD

// Public Routes
Route::get('categories', [CategoriesController::class, 'index']); // Incluye todas las rutas api de una operacion CRUD
Route::get('/categories/search/{recipe_category}', [CategoriesController::class, 'search']); // buscar un dato
Route::get('/categories/{id}', [CategoriesController::class, 'show']); // mostrar un dato

Route::get('/recipes', [RecipesController::class, 'index']); //ver todos los datos
Route::get('/recipes/{id}', [RecipesController::class, 'show']); // obtener un dato en especifico
Route::get('/recipes/search/{name}', [RecipesController::class, 'search']); // buscar un dato

// Regiter Routes (Public)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function(){

    //Protected categories
Route::post('/categories', [CategoriesController::class, 'store']); // crear un dato
Route::put('/categories/{id}', [CategoriesController::class, 'update']); // actualizar un dato
Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']); // eliminar un dato
    //Protected recipes
Route::post('/recipes', [RecipesController::class, 'store']); // agregar date
Route::put('/recipes/{id}', [RecipesController::class, 'update']); // actualizar dato
Route::delete('/recipes/{id}', [RecipesController::class, 'destroy']); // borrar dato
    //Protected Logout
Route::post('/logout', [AuthController::class, 'logout']); // user Logout route
});


/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/