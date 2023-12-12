<?php

use App\Http\Controllers\API\Article\FilterListController;
use App\Http\Controllers\API\Article\ListController;
use App\Http\Controllers\API\Article\ShowController;
use App\Http\Controllers\API\User\StoreController;
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


Route::group(['prefix' => '/articles'], function () {

    Route::get('/', ListController::class);

    Route::get('/filters', FilterListController::class);

    Route::get('/{article}', ShowController::class)->name('articleApi.show')->middleware('trackArticleViews');

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::post('/{article}/comments', \App\Http\Controllers\API\Article\Comment\StoreController::class);
    });

    Route::get('/{article}/comments', \App\Http\Controllers\API\Article\Comment\ShowController::class);
});

Route::get('user/{user}', \App\Http\Controllers\API\User\ShowController::class);


Route::post('/register', StoreController::class);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('register', 'App\Http\Controllers\AuthController@register')->name('api.register');
    Route::post('forgot-password', 'App\Http\Controllers\ForgotPasswordController@forgotPassword')->name('api.forgot-password');
    Route::post('login', 'App\Http\Controllers\AuthController@login')->name('api.login');
    Route::middleware('jwt.auth')->post('logout', 'App\Http\Controllers\AuthController@logout')->name('api.logout');
    Route::middleware('auth')->post('refresh', 'App\Http\Controllers\AuthController@refresh')->name('api.refresh');
    Route::middleware('jwt.auth')->post('me', 'App\Http\Controllers\AuthController@me')->name('api.me');
});




