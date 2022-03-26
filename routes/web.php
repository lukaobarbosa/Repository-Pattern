<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, 'getUser'])->name('index');

Route::post('/postUser', [UserController::class, 'postUser'])->name('postUser');

Route::delete('/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');

Route::get('/updatePage/{id}', [UserController::class, 'updatePage'])->name('updatePage');

Route::put('/updateUser/{id}', [UserController::class, 'updateUser'])->name('updateUser');