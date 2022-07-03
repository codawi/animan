<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Goutte\Client;

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
    $client = new Client();
    $crawler = $client->request('GET', 'https://comic.k-manga.jp/search/category/1');

        $images = array();
        $titles = array();
        $artists = array();
        $urls = array();

        //詳細ページのURL取得→links配列にいれる→配列に入れた値のURLに移動
        // →情報をそれぞれの配列化格納→戻る→繰り返し
        // →次のページへ→繰り返し→終了
        for($page = 2; $page < 50; $page ++) {
        //タイトル取得
        $crawler->filter('.book-list--title')->each(function ($node) use (&$titles) {
            $titles[] = $node->text();
        });

        //作家情報取得
        $crawler->filter('.book-list--author')->each(function ($node) use (&$artists) {
            $artists[] = $node->text();
        });
        
        //画像取得
        $crawler->filter('.book-list--img')->each(function ($node) use (&$images) {
            $images[] = $node->attr('src');
        });

        // URL取得
        $crawler->filter('.book-list--item')->each(function($node) use (&$urls) {
            $base_url = 'https://comic.k-manga.jp';
            $href_link = $node->attr('href');
            $urls[] = $base_url.$href_link;
        });

        //次のページへ移動
        // try {
        // $link = $crawler->selectLink($page)->link();
        // $crawler = $client->click($link);
        // } catch (\InvalidArgumentException $e) {
        //     break;
        // }
    }

        $works = [
            'titles' => $titles,
            'artists' => $artists,
            'images' => $images,
            'urls'=> $urls,
        ];
        dd($works);
        
        
});


require __DIR__.'/auth.php';

