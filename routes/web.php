<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Goutte\Client;

use App\Http\Controllers\IndexController;
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

// Route::get('/', [IndexController::class, 'index'])->name('Work.index');

// Route::get('/twitter', [TweetCountsController::class, 'index'])->name('Twitter.index');

Route::get('/', function () {
    $client = new Client();

    //少年→青年→少女→女性漫画週間ランキングの作品を順に取得
    $works = [];
    $categories = array('boy', 'male', 'girl', 'female');
    foreach ($categories as $category) {
        $crawler = $client->request("GET", "https://comic.k-manga.jp/rank/{$category}/weekly");
        $crawler->filter('.book-list--target')->each(function ($node) use (&$works) {
            $works[] = [
                //タイトル取得
                'title' => $node->filter('.book-list--title')->text(),

                //作家情報取得
                'author' => $node->filter('.book-list--author')->text('span'),

                //画像取得
                'image' => $node->filter('.book-list--img')->attr('src'),

                // URL取得
                'url' => $node->filter('.book-list--item')->attr('href'),
            ];
        });
    }
    dd($works);
});

require __DIR__ . '/auth.php';
