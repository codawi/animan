<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\animeController;
use App\Http\Controllers\BookMarkController;
use App\Http\Controllers\comicController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\TweetCountsController;


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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//トップページ
Route::get('/1', function () {
    return Inertia::render('Home');
})->name('home');


Route::group(['prefix' => 'anime', 'as' => 'anime.'], function () {
    //アニメランキング
    Route::get('daily', [AnimeController::class, 'indexDaily'])->name('daily');
    Route::get('weekly', [AnimeController::class, 'indexWeekly'])->name('weekly');
    Route::get('monthly', [AnimeController::class, 'indexMonthly'])->name('monthly');
    //アニメ作品詳細
    Route::get('work/{id}', [WorkController::class, 'index'])->name('work');
    //レビュー
    Route::group(['middleware' => 'auth', 'prefix' => 'work/{id}/review', 'as' => 'review.'], function () {
        Route::get('create', [RatingController::class, 'create'])->name('create');
        Route::get('show', [RatingController::class, 'show'])->name('show');
        Route::get('edit', [RatingController::class, 'edit'])->name('edit');
    });
});


Route::group(['prefix' => 'comic', 'as' => 'comic.'], function () {
    //漫画ランキング
    Route::get('daily', [ComicController::class, 'indexDaily'])->name('daily');
    Route::get('weekly', [ComicController::class, 'indexWeekly'])->name('weekly');
    Route::get('monthly', [ComicController::class, 'indexMonthly'])->name('monthly');
    //漫画作品詳細
    Route::get('work/{id}', [WorkController::class, 'index'])->name('work');
    //レビュー
    Route::group(['middleware' => 'auth', 'prefix' => 'work/{id}/review', 'as' => 'review.'], function () {
        Route::get('create', [RatingController::class, 'create'])->name('create');
        Route::get('show', [RatingController::class, 'show'])->name('show');
        Route::get('edit', [RatingController::class, 'edit'])->name('edit');
    });
});


//レビューDB関連
Route::group(['middleware' => 'auth', 'prefix' => '{id}/review', 'as' => 'review.'], function () {
    Route::post('store', [RatingController::class, 'store'])->name('store');
    Route::patch('update', [RatingController::class, 'update'])->name('update');
    Route::delete('delete', [RatingController::class, 'destroy'])->name('delete');
});


//キーワード検索
Route::get('/search/{queryWord}', [WorkController::class, 'search'])->name('work.search');


//ブックマーク
Route::group(['prefix' => 'bookmark/{id}', 'as' => 'bookmark.'], function () {
    Route::post('store', [BookmarkController::class, 'store'])->name('store');
    Route::delete('delete', [BookmarkController::class, 'destroy'])->name('delete');
});

Route::get('twitter', [TweetCountsController::class, 'index'])->name('Twitter.index');


require __DIR__ . '/auth.php';
