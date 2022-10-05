<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use App\Models\Work;

class ComicScrapingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ComicScraping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '漫画作品スクレイピング用のコマンド';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //漫画スクレイピング
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
        };

        //DB保存
        foreach ($works as $work) {
            Work::updateOrCreate([
                'category' => 'comic',
                'title' => $work['title'],
            ],[
                'copyright' => $work['author'] ?? null,
                'image' => $work['image'] ?? null1,
                'url' => $work['url'] ?? null,
            ]);
        }
    }
}
