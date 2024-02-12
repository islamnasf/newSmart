<?php

use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\{
    MandubAppController,
    TeacherController,
    CoursesController,
    BooksController
};
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//course
Route::get('/courses', [CoursesController::class, 'index']);
//books
Route::get('/books', [BooksController::class, 'index']);
//
Route::post('/make/order/from/app', [OrderController::class, 'store']);
//cities
Route::get('/cities/for/order', [OrderController::class, 'citiesForOrder']);
//
Route::get('/tutorial/{course}', [CoursesController::class, 'tutorial']);
Route::get('/filedownload/{file}', [CoursesController::class, 'download']);
Route::get('/filedownload/books/{file}', [BooksController::class, 'download']);
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/subscription/{user}', [CoursesController::class, 'userSubscription']);
});
//mandub app
Route::group(['middleware' => 'api'], function ($router) {
    Route::prefix('teacher')->group(function () {
        Route::get('/index', [TeacherController::class, 'index']);
    });
    Route::get('/mandub/orders/{mandub}', [MandubAppController::class, 'index']);
    Route::get('/mandub/order/details/{order}', [MandubAppController::class, 'orderDetails']);
    Route::get('/mandub/order/details/package/{package}', [MandubAppController::class, 'packageDetails']);
    Route::post('/order/new/to/current/{order}/{mandub}', [MandubAppController::class, 'changeOrderTocurrent']);
    Route::get('/order/current/orders/{mandub}', [MandubAppController::class, 'currentOrders']);
    Route::post('/order/current/to/complate/{order}', [MandubAppController::class, 'changeOrderTocomplate']);
    Route::get('/order/complate/orders/{mandub}', [MandubAppController::class, 'complateOrders']);
    Route::get('/mandub/books/quantity/{mandub}', [MandubAppController::class, 'mandubBooks']);
    Route::Post('/mandub/books/station/to/quantity/{mandub}/{book}', [MandubAppController::class, 'addedNewBookFromStore']);
    Route::get('/mandub/books/packages/classes', [MandubAppController::class, 'booksandpackagesClasses']);
    //make order
    Route::Post('/mandub/add/book/to/cart/{mandub}/{book}', [MandubAppController::class, 'addToCartbooks']);
    Route::Post('/mandub/add/package/to/cart/{mandub}/{package}', [MandubAppController::class, 'addToCartPackages']);
    Route::Post('/mandub/books/cart/delete/book/{book}', [MandubAppController::class, 'deleteBookItem']);
    Route::Post('/mandub/books/cart/delete/package/{package}', [MandubAppController::class, 'deletePackageItem']);
    Route::Post('/mandub/books/cart/delete/package/all/{mandub}', [MandubAppController::class, 'deleteAllItemsFromOrder']);
    Route::Post('/mandub/books/cart/create/current/order/{mandub}/{city}', [MandubAppController::class, 'neworderbook']);
    //
    Route::Post('/mandub/update/quantity/from/book/current/order/{mandub}', [MandubAppController::class, 'updateQuantity']);
});
