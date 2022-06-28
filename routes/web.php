<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\IndexController;

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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/', [IndexController::class, 'index'])->name('Work.index');

Route::get('/', function() {
        $goutte = Goutte::request('GET', 'https://sakuhindb.com/manga-ranking/2022/');
        //画像を取得するための配列
        $images = array();
        //タイトルを取得するための配列
        $titles = array();
        
        //画像取得
        //詳細ページに移動→画像、タイトル、作者情報取得を繰り返す。
        $goutte->filter('tr td span img')->each(function ($node) use (&$images) {
            $images[] = $node->attr('.src');
        });
        dd($images);
        
});


require __DIR__.'/auth.php';

