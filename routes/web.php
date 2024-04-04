<?php

use Illuminate\Support\Facades\Route;

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
Route::resource('books', App\Http\Controllers\BookController::class);
Route::resource('authors', App\Http\Controllers\AuthorController::class);
Route::resource('collaborators', App\Http\Controllers\CollaboratorController::class);
// Route::resource('books', App\Http\Controllers\BookController::class);
// Route::resource('books', App\Http\Controllers\BookController::class);
// Route::resource('books', App\Http\Controllers\BookController::class);
// Route::resource('books', App\Http\Controllers\BookController::class);
// Route::resource('books', App\Http\Controllers\BookController::class);
// Route::resource('books', App\Http\Controllers\BookController::class);
// Route::resource('books', App\Http\Controllers\BookController::class);
// Route::resource('books', App\Http\Controllers\BookController::class);

//Route::get('{slug}');
