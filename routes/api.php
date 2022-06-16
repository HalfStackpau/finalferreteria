<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Products;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProveidorController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'getById']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'delete']);

Route::get('/proveidor', [ProveidorController::class, 'index']);
Route::post('/proveidor', [ProveidorController::class, 'store']);
Route::put('/proveidor/{id}', [ProveidorController::class, 'update']);
Route::delete('/proveidor/{id}', [ProveidorController::class, 'delete']);

Route::get("/prueba", function(){
    return "prueba";
});