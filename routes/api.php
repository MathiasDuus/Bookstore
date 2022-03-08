<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Controllers
use \App\Http\Controllers\AuthorController;
use \App\Http\Controllers\GenreController;
use \App\Http\Controllers\PublisherController;
use \App\Http\Controllers\DepartmentController;
use \App\Http\Controllers\CustomerController;
use \App\Http\Controllers\CountryController;
use \App\Http\Controllers\PostalController;
use \App\Http\Controllers\AddressController;
use \App\Http\Controllers\BookController;
use \App\Http\Controllers\OrderController;
use \App\Http\Controllers\OrderLineController;
use \App\Http\Controllers\StoreController;
use \App\Http\Controllers\DepotController;
use \App\Http\Controllers\EmployeeController;
use \App\Http\Controllers\BookGenreController;

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
// Books
Route::get('book',[BookController::class,'index'])->name('book.index');
Route::get('book/amount/{amount}',[BookController::class,'index'])->name('book.amount');
Route::get('book/{book}',[BookController::class,'show'])->name('book.show');
// Authors
Route::get('author',[AuthorController::class,'index'])->name('author.index');
Route::get('author/{author}',[AuthorController::class,'show'])->name('author.show');
// Genres
Route::get('genre',[GenreController::class,'index'])->name('genre.index');
Route::get('genre/{genre}',[GenreController::class,'show'])->name('genre.show');
// Publishers
Route::get('publisher',[PublisherController::class,'index'])->name('publisher.index');
Route::get('publisher/{publisher}',[PublisherController::class,'show'])->name('publisher.show');
// Countries
Route::get('country',[CountryController::class,'index'])->name('country.index');
Route::get('country/{country}',[CountryController::class,'show'])->name('country.show');
// Depots
Route::get('depot',[DepotController::class,'index'])->name('depot.index');
Route::get('depot/{depot}',[DepotController::class,'show'])->name('depot.show');
// BookGenres
Route::get('bookGenre',[BookGenreController::class,'index'])->name('bookGenre.index');
Route::get('bookGenre/{bookGenre}',[BookGenreController::class,'show'])->name('bookGenre.show');




Route::middleware('auth:customer_api')->get('/customer_token_test', function (Request $request) {
    return "Customer token works, Good job :)";
})->name('Customer token test');
Route::middleware('auth:employee_api')->get('/employee_token_test', function (Request $request) {
    return "Employee token works, Good job :)";
})->name('Employee token test');


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






