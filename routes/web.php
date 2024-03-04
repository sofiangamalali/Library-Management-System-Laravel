<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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


Route::get('/', [HomeController::class, 'index']);
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('home');
});



// Categotry
Route::get('/category_page', [AdminController::class, 'category_page']);
Route::post('/add_category', [AdminController::class, 'add_category']);
Route::get('/cat_delete/{id}', [AdminController::class, 'cat_delete']);
Route::get('/cat_update/{id}', [AdminController::class, 'cat_update']);
Route::post('/update_category/{id}', [AdminController::class, 'update_category']);


// Books
Route::get('/add_book', [AdminController::class, 'add_book']);
Route::post('/store_book', [AdminController::class, 'store_book']);
Route::get('/show_book', [AdminController::class, 'show_book']);
Route::get('/book_delete/{id}', [AdminController::class, 'book_delete']);
Route::get('/book_update/{id}', [AdminController::class, 'book_update']);
Route::post('/update_book/{id}', [AdminController::class, 'update_book']);



// Author
Route::get('/author_page', [AdminController::class, 'author_page']);
Route::post('/add_author', [AdminController::class, 'add_author']);
Route::get('/author_delete/{id}', [AdminController::class, 'author_delete']);
Route::get('/author_edit/{id}', [AdminController::class, 'author_edit']);
Route::post('/update_author/{id}', [AdminController::class, 'update_author']);
