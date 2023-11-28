<?php

use App\Http\Controllers\API\Article\FilterListController;
use App\Http\Controllers\API\Article\ListController;
use App\Http\Controllers\API\Article\ShowController;
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

Route::post('/articles', ListController::class);
Route::get('/articles/filters', FilterListController::class);
Route::get('/articles/{article}', ShowController::class);
