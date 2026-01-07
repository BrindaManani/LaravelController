<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [HomeController::class, 'getUsers'])->name('getUsers');
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');

Route::get('/add/{id?}', [UserController::class, 'addUser'])->name('addUser');
// Route::post('/create/{id?}', [UserController::class, 'createUser'])->name('createUser');

// Route::get('/add', [UserController::class, 'addUser'])->name('addUser');
// Route::post('/create', [UserController::class, 'createUser'])->name('createUser');

// Route::get('/edit/{id}', [UserController::class, 'editUser'])->name('editUser');
Route::post('/createUser', [UserController::class, 'createUser'])->name('createUser');
Route::get('/userdelete/{id}', [UserController::class, 'userdelete'])->name('userdelete');
// Route::get('/delete', function () {
//     session()->forget('users');
// });