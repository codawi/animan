<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Goutte\Client;

class Work extends Model
{
  use HasFactory;

  protected $fillable = ['category', 'title', 'author', 'image', 'copyright', 'url', 'media'];

  //annictAPI作品情報取得
  public function annictQuery()
  {
    $query = <<<GQL
    query {
        searchWorks(seasons: ["2022-spring","2022-summer","2022-autumn","2022-winter"]) {
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

    $graphqlEndpoint = 'https://api.annict.com/graphql';
    $client = new \GuzzleHttp\Client();
    $secret_key = config('app.secret_key');

    $response = $client->request('POST', $graphqlEndpoint, [
      'headers' => [
        'Content-Type' => 'application/json',
        'Authorization' => "Bearer {$secret_key}"
      ],
      'json' => [
        'query' => $query
      ]
    ]);
    $this->annictStore($response);
  }

  public function annictStore($response)
  {
    $annict_data = json_decode($response->getBody()->getContents());
    $annict_works = $annict_data->data->searchWorks->edges;

    foreach ($annict_works as $annict_work) {
      Work::create([
        'category' => 'anime',
        'title' => $annict_work->node->title,
        'image' => $annict_work->node->image->facebookOgImageUrl,
        'copyright' => $annict_work->node->image->copyright,
        'url' => $annict_work->node->officialSiteUrl,
        'media' => $annict_work->node->media,
      ]);
    }
  }


  //漫画スクレイピング
  public function comicScraping()
  {
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
    $this->comicStore($works);
  }

  public function comicStore($works)
  {
    //DB保存
    foreach ($works as $work) {
      Work::create([
        'category' => 'comic',
        'title' => $work['title'],
        'author' => $work['author'],
        'image' => $work['image'],
        'url' => $work['url'],
      ]);
    }
  }
}
