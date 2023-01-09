<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Work;

class AnimeScrapingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:AnimeScraping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'アニメ作品スクレイピング用のコマンド';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //annictAPI作品情報取得
        $query = <<<GQL
    query {
        searchWorks(seasons: ["2022-spring","2022-summer","2022-autumn","2022-winter", "2023-winter"]) {
          edges {
            node {
              title
              image {
                facebookOgImageUrl
                copyright
              }
              officialSiteUrl
              media
            }
          }
        }
      }
GQL;

        $graphql_endpoint = 'https://api.annict.com/graphql';
        $client = new \GuzzleHttp\Client();
        $secret_key = config('app.secret_key');

        $response = $client->request('POST', $graphql_endpoint, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer {$secret_key}"
            ],
            'json' => [
                'query' => $query
            ]
        ]);

        //DB保存
        $annict_data = json_decode($response->getBody()->getContents());
        $annict_works = $annict_data->data->searchWorks->edges;

        foreach ($annict_works as $annict_work) {
            Work::updateOrCreate([
                'category' => 'anime',
                'title' => $annict_work->node->title,
            ],[
                'image' => $annict_work->node->image->facebookOgImageUrl ?? null,
                'copyright' => $annict_work->node->image->copyright ?? null,
                'url' => $annict_work->node->officialSiteUrl ?? null,
                'media' => $annict_work->node->media ?? null,
            ]);
        }
    }
}
