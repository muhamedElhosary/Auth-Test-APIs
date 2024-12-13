<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login',[UserController::class,'login']);
Route::post('admin-login',[AdminController::class,'login']);

Route::group(['middleware'=>'auth:sanctum'],function(){

Route::post('logout',[UserController::class,'logout']);
Route::post('admin-logout',[AdminController::class,'logout']);
// use gate and middleware on crud operations

###### only admins or author of post can use this route ######
Route::delete('category/{id}',[CategoryController::class,'destroy'])->middleware('who.can:admin,user');

##### only author of post can use this route ######
Route::put('category/{id}',[CategoryController::class,'update'])->middleware('who.can:user');

##### all auth can use this ######
Route::get('category',[CategoryController::class,'index'])->middleware('who.can:admin,user');
});