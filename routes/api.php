<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Categoriescontroller;
use App\Http\Controllers\Productscontroller;
use App\Http\Controllers\AuthController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});



Route::post("categories" , [Categoriescontroller::class,'create']);
Route::get("categories" , [Categoriescontroller::class,'index']);
Route::get("category/{id}" , [Categoriescontroller::class,'show']);

Route::put("update" , [Categoriescontroller::class,'update']);
Route::post("destroy/{id}" , [Categoriescontroller::class,'delete']);
Route::get("serch/{name}" , [Categoriescontroller::class,'search']);



Route::post("products" , [Productscontroller::class,'create']);
Route::get("products" , [Productscontroller::class,'index']);
Route::get("product/{id}" , [Productscontroller::class,'show']);
Route::post("update" , [Productscontroller::class,'update']);
Route::post("delete/{id}" , [Productscontroller::class,'delete']);
Route::get("search/{name}" , [Productscontroller::class,'search']);



