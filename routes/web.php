<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post-by-tag/{posttag}', [HomeController::class, 'index'])->name('posttag');
Route::get('/details/{slug}', [HomeController::class, 'details'])->name('details');
Route::get('/about-me', [HomeController::class, 'about'])->name('about');
Route::get('/tags', [HomeController::class, 'tags'])->name('tags');