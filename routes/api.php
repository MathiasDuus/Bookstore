<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CustomerController;
use App\Http\Controllers\BookController;

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

// API Routes available for employees only
Route::group(['middleware' => ['auth:employee_api']], function () {
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
    Route::apiResource('/orderLine', \App\Http\Controllers\OrderLineController::class);
    Route::apiResource('/store', \App\Http\Controllers\StoreController::class);
    Route::apiResource('/depot', \App\Http\Controllers\DepotController::class);
    Route::apiResource('/employee', \App\Http\Controllers\EmployeeController::class);
    Route::apiResource('/bookGenre', \App\Http\Controllers\BookGenreController::class);
});

# API Routes available for customers and employees
Route::group(['middleware' => ['auth:customer_api,employee_api']], function () {
    Route::get('customer/{customer}',[CustomerController::class,'show'])->name('customer.show');
});


# Unprotected routes
Route::get('book',[BookController::class,'index'])->name('book.index');
Route::get('book/{book}',[BookController::class,'show'])->name('book.show');


// API ROUTES
//Route::apiResource('/author', \App\Http\Controllers\AuthorController::class);
//Route::apiResource('/genre', \App\Http\Controllers\GenreController::class);
//Route::apiResource('/publisher', \App\Http\Controllers\PublisherController::class);
//Route::apiResource('/department', \App\Http\Controllers\DepartmentController::class);
//Route::apiResource('/customer', \App\Http\Controllers\CustomerController::class);
//Route::apiResource('/country', \App\Http\Controllers\CountryController::class);
//Route::apiResource('/postal', \App\Http\Controllers\PostalController::class);
//Route::apiResource('/address', \App\Http\Controllers\AddressController::class);
//Route::apiResource('/book', \App\Http\Controllers\BookController::class);
//Route::apiResource('/order', \App\Http\Controllers\OrderController::class);
//Route::apiResource('/orderLine', \App\Http\Controllers\OrderLineController::class);
//Route::apiResource('/store', \App\Http\Controllers\StoreController::class);
//Route::apiResource('/depot', \App\Http\Controllers\DepotController::class);
//Route::apiResource('/employee', \App\Http\Controllers\EmployeeController::class);
//Route::apiResource('/bookGenre', \App\Http\Controllers\BookGenreController::class);



Route::middleware('auth:customer_api')->get('/customer_token_test', function (Request $request) {
    return "Customer token works, Good job :)";
})->name('Customer token test');
Route::middleware('auth:employee_api')->get('/employee_token_test', function (Request $request) {
    return "Employee token works, Good job :)";
})->name('Employee token test');


