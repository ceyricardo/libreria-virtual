<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('authors', [AuthorController::class, 'index']);
Route::get('authors/{id}', [AuthorController::class, 'show']);
Route::get('authors/{id}/books', [AuthorController::class, 'getBooks']);
Route::post('authors', [AuthorController::class, 'store']);
Route::put('authors/{id}', [AuthorController::class, 'update']);
Route::delete('authors/{id}', [AuthorController::class, 'destroy']);

Route::get('books', [BookController::class, 'index']);
Route::get('books/{id}', [BookController::class, 'show']);
Route::get('books/{id}/qualification', [BookController::class, 'getQualification']);
Route::post('books', [BookController::class, 'store']);
Route::put('books/{id}', [BookController::class, 'update']);
Route::delete('books/{id}', [BookController::class, 'destroy']);

Route::get('reviews', [ReviewController::class, 'index']);
Route::get('reviews/{id}', [ReviewController::class, 'show']);
Route::post('reviews', [ReviewController::class, 'store']);
Route::put('reviews/{id}', [ReviewController::class, 'update']);
Route::delete('reviews/{id}', [ReviewController::class, 'destroy']);

Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'store']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);
