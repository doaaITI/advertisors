<?php

use App\Http\Controllers\API\AdvertiseController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Node\CrapIndex;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('categories', CategoryController::class)->except(['update','destroy']);
Route::Put('update/category',[CategoryController::class,'update']);
Route::delete('delete/category',[CategoryController::class,'destroy']);


Route::resource('tags', TagController::class)->except(['update','destroy']);
Route::Put('update/tag',[TagController::class,'update']);
Route::delete('delete/tag',[TagController::class,'destroy']);


Route::resource('advertises', AdvertiseController::class)->except(['update','destroy']);
Route::Put('update/advertises',[AdvertiseController::class,'update']);
Route::delete('delete/advertises',[AdvertiseController::class,'destroy']);


