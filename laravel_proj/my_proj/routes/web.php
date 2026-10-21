<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


Route::get('/', [PageController::class, 'index']);
Route::get('/form', [PageController::class, 'showForm']);
Route::post('/submit', [PageController::class, 'submit']);

