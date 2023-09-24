<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::post('/login', [ProfileController::class, 'login'])->name('auth.login');
Route::get('me', [ProfileController::class, 'me'])->middleware(['auth:web'])->name('profile');
Route::post('logout', [ProfileController::class, 'logout'])->middleware(['auth:web'])->name('logout');

Route::get('/', fn () => view('app'));
Route::apiResource('group', GroupController::class);
Route::apiResource('user', UserController::class);
Route::apiResource('client', ClientController::class);
Route::apiResource('app', AppController::class);

Route::post('app/{app}/test', [AppController::class, 'test'])->name('app.test');
Route::post('app/{app}/install', [AppController::class, 'install'])->name('app.test');
Route::post('app/{app}/start', [AppController::class, 'start'])->name('app.start');
Route::put('app/{app}/start', [AppController::class, 'started'])->name('app.started');
Route::put('app/{app}/install', [AppController::class, 'installed'])->name('app.installed');
