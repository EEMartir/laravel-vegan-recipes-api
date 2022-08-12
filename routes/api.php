<?php
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\RecipesController;
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

Route::resource('categories', CategoriesController::class); // Incluye todas las rutas api de una operacion CRUD
Route::get('/categories/search/{recipe_category}', [CategoriesController::class, 'search']); // buscar un dato

Route::resource('recipes', RecipesController::class); // Incluye todas las rutas api de una operacion CRUD
Route::get('/recipes/search/{name}', [RecipesController::class, 'search']); // buscar un dato


/*
Route::get('/recipes', [RecipesController::class, 'index']); //ver todos los datos
Route::get('/recipes/{id}', [RecipesController::class, 'show']); // obtener un dato en especifico
Route::get('/recipes/search/{name}', [RecipesController::class, 'search']); // buscar un dato
Route::post('/recipes', [RecipesController::class, 'store']); // agregar date
Route::put('/recipes/{id}', [RecipesController::class, 'update']); // actualizar dato
Route::delete('/recipes/{id}', [RecipesController::class, 'destroy']); // borrar dato
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
