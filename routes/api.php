<?php

use Illuminate\Support\Facades\Route;

Route::post('rand-num/generate', [App\Http\Controllers\Api\RandomNumController::class, 'generate']);
Route::get('rand-num/retrieve', [App\Http\Controllers\Api\RandomNumController::class, 'retrieve']);
