<?php

use App\Http\Controllers\orderController;
use App\Http\Controllers\productController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\staticController;
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

Route::get('/', [staticController::class,'home'])->name("home.index");

Route::get('/about', [staticController::class,'about'])->name("home.about");

Route::any('/contact',  [staticController::class,'contact'])->name('home.contact');

Route::resources(['product'=>productController::class]);

Route::resources(['orders'=>orderController::class]);