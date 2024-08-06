<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DetailTransactionController; 
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController; 
use App\Http\Controllers\StuffController; 
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;

Route::get('generateData', [AuthController::class, 'generateData']);
Route::get('/', function () {return view('home');})->middleware('is.auth');
Route::get('login', [AuthController::class, 'showLogin'])->middleware('is.not.auth'); 
Route::post('login', [AuthController::class, 'actionLogin'])->middleware('is.not.auth');
Route::middleware(['is.auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'actionLogout']);
    Route::get('transactions', [TransactionController::class, 'index']); 
    Route::get('transactions/create', [TransactionController::class, 'create']);
    Route::get('transaction', [TransactionController::class, 'index']); 
    Route::get('transaction/add', [TransactionController::class, 'create']);

    Route::get('customer', [CustomerController::class, 'index']); 
    Route::get('customer/add', [CustomerController::class, 'create']);
    Route::post('customer', [CustomerController::class, 'store']); 
    Route::get('customer/{customer}', [CustomerController::class, 'show']);
    Route::put('customer/{customer}', [CustomerController::class, 'update']);
    Route::delete('customer/{customer}', [CustomerController::class, 'destroy']);

    Route::get('category', [CategoryController::class, 'index']); 
    Route::get('category/add', [CategoryController::class, 'create']);
    Route::post('category', [CategoryController::class, 'store']); 
    Route::get('category/{category}', [CategoryController::class, 'show']);
    Route::put('category/{category}', [CategoryController::class, 'update']);
    Route::delete('category/{category}', [CategoryController::class, 'destroy']);

    Route::get('user', [UserController::class, 'index']); 
    Route::get('user/add', [UserController::class, 'create']);
    Route::post('user', [UserController::class, 'store']); 
    Route::get('user/{user}', [UserController::class, 'show']);
    Route::put('user/{user}', [UserController::class, 'update']);
    Route::delete('user/{user}', [UserController::class, 'destroy']);

    Route::get('stuff', [StuffController::class, 'index']); 
    Route::get('stuff/add', [StuffController::class, 'create']);
    Route::post('stuff', [StuffController::class, 'store']); 
    Route::get('stuff/{stuff}', [StuffController::class, 'show']);
    Route::put('stuff/{stuff}', [StuffController::class, 'update']);
    Route::delete('stuff/{stuff}', [StuffController::class, 'destroy']);

});


Route::get('/template', function(){ return view('home');});

Route::get('/menu', [MenuController::class, 'index']);

Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/add', [KategoriController::class, 'add']);
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
Route::get('/kategori/{id}/delete', [KategoriController::class, 'delete']);
Route::post('/kategori/save', [KategoriController::class, 'save']);

