<?php

use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('index');

Route::post('/store', [WelcomeController::class, 'store'])->name('store');

Route::get('/delete/{perrito}', [WelcomeController::class, 'delete'])->name('delete');

Route::get('/update/{perrito}', [WelcomeController::class, 'update'])->name('update');

Route::post('/update/{perrito}', [WelcomeController::class, 'saveUpdate'])->name('saveUpdate');

