<?php

use App\Http\Controllers\AboutAppController;
use App\Http\Controllers\AlQuranController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/surat', [AlQuranController::class, 'suratList'])->name('surat.list');
Route::get('/surat/{nomor}', [AlQuranController::class, 'suratShow'])->name('surat.show');
Route::get('/about-app', [AboutAppController::class, 'aboutApp'])->name('about-app');