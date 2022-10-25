<?php

use App\Http\Controllers\ProductControler;
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
//Route::resource("products", ProductControler::class);

//Public Routes
Route::post("/register",[AuthController::class , 'register']);
Route::post("/login",[AuthController::class , 'login']);
Route::get("/products", [ProductControler::class , 'index']);
Route::get("/products/search/{id}",[ProductControler::class , 'show']);
Route::get("/products/search/{name}",[ProductControler::class , 'search']);

//Protected Routes
Route::group(["middleware" => ["auth:sanctum"]], function(){
    Route::post("/logout",[AuthController::class , 'logout']);
    Route::post("/products/",[ProductControler::class , 'store']);
    Route::put("/products/{id}",[ProductControler::class , 'update']);
    Route::delete("/products/{id}",[ProductControler::class , 'destroy']);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
