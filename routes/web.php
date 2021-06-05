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

Route::get('/video/{video}/edit', [App\Http\Controllers\VideoController::class, 'edit'])
      ->name('video.edit')
      ->middleware('can:update,video');

Route::patch('/video/{video}', [App\Http\Controllers\VideoController::class, 'update'])
      ->name('video.update')
      ->middleware('can:update,video');

// Rules
Route::get('/rules', [App\Http\Controllers\RulesController::class, 'index'])
      ->name('rules.index');

// Watched

Route::get('/watched', [App\Http\Controllers\WatchedController::class, 'index'])
      ->name('watched.index');

// Unwatched

Route::post('/video/toggle/{video}', [App\Http\Controllers\WatchedController::class, 'update'])
      ->middleware('can:update,video');