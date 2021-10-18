<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', [NewsController::class, 'index'])->middleware('cors');
