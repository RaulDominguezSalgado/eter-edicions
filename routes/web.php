<?php

use Illuminate\Support\Facades\Route;


/* MiddleWare */
use App\Http\Middleware\AdminCheck;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('catalogo', [App\Http\Controllers\BookController::class, 'catalogo']);

Route::resource('authors', App\Http\Controllers\AuthorController::class);


/* Admin Backoffice */
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    Route::resource('books', App\Http\Controllers\BookController::class);
    Route::resource('collaborators', App\Http\Controllers\CollaboratorController::class);
    Route::resource('collections', App\Http\Controllers\CollectionController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
})->middleware(AdminCheck::class);

//Route::get('{slug}');
