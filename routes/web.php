<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});



/////////////////
Route::get('/pcreate',[CategoryController::class,'create']);
Route::post('/pcreate',[CategoryController::class,'store']);
Route::get('/products', [CategoryController::class, 'index']);
//edit

Route::get('/product/{product}/edit',[CategoryController::class,'edit']);
//save the edit
Route::post('/product/{product}/update',[CategoryController::class,'update']);
// delte
Route::post('/product/{product}/delete',[CategoryController::class,'delete']);
/////










/////

 Route::get('/register',[UserController::class,'create']);
 Route::post('/register',[UserController::class,'store']);



 Route::get('/users', [UserController::class, 'index']);
