<?php

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

Auth::routes();

Route::post('/video', [App\Http\Controllers\VideoController::class, 'store']);

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('index');
Route::get('/video/create', [App\Http\Controllers\VideoController::class, 'create'])
      ->name('video.create')
      ->middleware('can:create,App\Models\Video');

