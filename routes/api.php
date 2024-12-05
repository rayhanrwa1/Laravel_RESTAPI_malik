<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\AuthorController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route untuk Quotes
Route::apiResource('quotes', QuoteController::class);

// Route untuk Authors
Route::apiResource('authors', AuthorController::class);
