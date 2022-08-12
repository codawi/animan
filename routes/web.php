<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\animeController;
use App\Http\Controllers\comicController;
use App\Http\Controllers\WorkController;
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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/anime/daily', [animeController::class, 'indexDaily'])->name('anime.daily');
Route::get('/comic/daily', [comicController::class, 'indexDaily'])->name('comic.daily');

Route::get('/anime/weekly', [animeController::class, 'indexWeekly'])->name('anime.weekly');
Route::get('/comic/weekly', [comicController::class, 'indexWeekly'])->name('comic.weekly');

Route::get('/anime/monthly', [animeController::class, 'indexMonthly'])->name('anime.monthly');
Route::get('/comic/monthly', [comicController::class, 'indexMonthly'])->name('comic.monthly');

Route::get('/work/anime/{id}', [WorkController::class, 'showAnime'])->name('work.anime');
Route::get('/work/comic/{id}', [WorkController::class, 'showComic'])->name('work.comic');

Route::get('/twitter', [TweetCountsController::class, 'index'])->name('Twitter.index');


require __DIR__ . '/auth.php';
