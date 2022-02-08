<?php

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

// API ROUTES
Route::apiResource('/author', \App\Http\Controllers\AuthorController::class);
Route::apiResource('/genre', \App\Http\Controllers\GenreController::class);
Route::apiResource('/publisher', \App\Http\Controllers\PublisherController::class);
Route::apiResource('/department', \App\Http\Controllers\DepartmentController::class);
Route::apiResource('/customer', \App\Http\Controllers\CustomerController::class);
Route::apiResource('/country', \App\Http\Controllers\CountryController::class);
Route::apiResource('/postal', \App\Http\Controllers\PostalController::class);
Route::apiResource('/address', \App\Http\Controllers\AddressController::class);
Route::apiResource('/book', \App\Http\Controllers\BookController::class);
Route::apiResource('/order', \App\Http\Controllers\OrderController::class);
//Route::apiResource('/orderLine', \App\Http\Controllers\OrderLineController::class);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
