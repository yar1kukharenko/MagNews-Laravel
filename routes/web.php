<?php

use App\Http\Controllers\Category\CreateController;
use App\Http\Controllers\Category\DeleteController;
use App\Http\Controllers\Category\EditController;
use App\Http\Controllers\Category\IndexController;
use App\Http\Controllers\Category\ShowController;
use App\Http\Controllers\Category\StoreController;
use App\Http\Controllers\Category\UpdateController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/', \App\Http\Controllers\Main\IndexController::class)->name('main.index');
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', IndexController::class)->name('category.index');
        Route::get('/create', CreateController::class)->name('category.create');
        Route::post('/', StoreController::class)->name('category.store');
        Route::get('/{category}/edit', EditController::class)->name('category.edit');
        Route::get('/{category}', ShowController::class)->name('category.show');
        Route::patch('/{category}', UpdateController::class)->name('category.update');
        Route::delete('/{category}', DeleteController::class)->name('category.delete');
    });


    Route::group(['prefix' => 'users'], function () {
        Route::get('/', \App\Http\Controllers\User\IndexController::class)->name('user.index');
        Route::get('/create', \App\Http\Controllers\User\CreateController::class)->name('user.create');
        Route::post('/', \App\Http\Controllers\User\StoreController::class)->name('user.store');
        Route::get('/{user}/edit', \App\Http\Controllers\User\EditController::class)->name('user.edit');
        Route::get('/{user}', \App\Http\Controllers\User\ShowController::class)->name('user.show');
        Route::patch('/{user}', \App\Http\Controllers\User\UpdateController::class)->name('user.update');
        Route::delete('/{user}', \App\Http\Controllers\User\DeleteController::class)->name('user.delete');
    });

    Route::group(['prefix' => 'articles'], function () {
        Route::get('/', \App\Http\Controllers\Article\IndexController::class)->name('article.index');
        Route::get('/create', \App\Http\Controllers\Article\CreateController::class)->name('article.create');
        Route::post('/', \App\Http\Controllers\Article\StoreController::class)->name('article.store');
        Route::get('/{article}/edit', \App\Http\Controllers\Article\EditController::class)->name('article.edit');
        Route::get('/{article}', \App\Http\Controllers\Article\ShowController::class)->name('article.show');
        Route::patch('/{article}', \App\Http\Controllers\Article\UpdateController::class)->name('article.update');
        Route::delete('/{article}', \App\Http\Controllers\Article\DeleteController::class)->name('article.delete');
    });
    Route::group(['prefix' => 'comments'], function () {
        Route::get('/', \App\Http\Controllers\Article\Comment\IndexController::class)->name('comment.index');
        Route::post('/{comment}/approve', [\App\Http\Controllers\Article\Comment\IndexController::class, 'approve'])->name('comment.approve');
        Route::post('/{comment}/reject', [\App\Http\Controllers\Article\Comment\IndexController::class, 'reject'])->name('comment.reject');
    });


});

Auth::routes();



