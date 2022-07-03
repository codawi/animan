<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Goutte\Client;

class Work extends Model
{
  use HasFactory;

  protected $fillable = ['category', 'title', 'image', 'copyright', 'url', 'media'];

  //annictAPI作品情報取得
  private $response;
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

    $this->response = $client->request('POST', $graphqlEndpoint, [
      'headers' => [
        'Content-Type' => 'application/json',
        // include any auth tokens here
        'Authorization' => "Bearer {$secret_key}"
      ],
      'json' => [
        'query' => $query
      ]
    ]);
  }

  public function annictStore()
  {
    $annict_data = json_decode($this->response->getBody()->getContents());
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
  public function comicScraping() {
  $client = new Client();
  //少年漫画週間ランキング
  $crawler = $client->request('GET', 'https://comic.k-manga.jp/rank/boy/weekly');

      $images = array();
      $titles = array();
      $artists = array();
      $urls = array();

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
          $href_link = $node->attr('href');
          $urls[] = $href_link;
      });

      $works = [
          'titles' => $titles,
          'artists' => $artists,
          'images' => $images,
          'urls'=> $urls,
      ];
    }
      
      
}
