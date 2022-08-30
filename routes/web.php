<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\animeController;
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

// Route::get('/', [IndexController::class, 'index'])->name('index');

Route::group(['prefix' => 'anime', 'as' => 'anime.'], function () {
    Route::get('daily', [AnimeController::class, 'indexDaily'])->name('daily');
    Route::get('weekly', [AnimeController::class, 'indexWeekly'])->name('weekly');
    Route::get('monthly', [AnimeController::class, 'indexMonthly'])->name('monthly');
    Route::get('work/{id}', [WorkController::class, 'showAnime'])->name('work');
    Route::get('work/{id}/review/create', [RatingController::class, 'animeReviewCreate'])->name('review.create');
    Route::get('work/{id}/review/show', [RatingController::class, 'animeReviewShow'])->name('review.show');
    Route::get('work/{id}/review/edit', [RatingController::class, 'animeReviewEdit'])->name('review.edit');
});

Route::group(['prefix' => 'comic', 'as' => 'comic.'], function () {
    Route::get('daily', [ComicController::class, 'indexDaily'])->name('daily');
    Route::get('weekly', [ComicController::class, 'indexWeekly'])->name('weekly');
    Route::get('monthly', [ComicController::class, 'indexMonthly'])->name('monthly');
    Route::get('work/{id}', [WorkController::class, 'showComic'])->name('work');
    Route::get('work/{id}/review/create', [RatingController::class, 'comicReviewCreate'])->name('review.create');
    Route::get('work/{id}/review/show', [RatingController::class, 'comicReviewShow'])->name('review.show');
    Route::get('work/{id}/review/edit', [RatingController::class, 'comicReviewEdit'])->name('review.edit');
});

Route::post('/review/store', [RatingController::class, 'store'])->name('review.store');

Route::get('/twitter', [TweetCountsController::class, 'index'])->name('Twitter.index');


require __DIR__ . '/auth.php';
