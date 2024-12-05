<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\CountryController;
use App\Models\Country;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('quotes', QuoteController::class);
Route::apiResource('authors', AuthorController::class);
Route::apiResource('country', CountryController::class);