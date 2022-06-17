<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Work extends Model
{
  use HasFactory;

  protected $fillable = ['category', 'title', 'image', 'copyright', 'url', 'media'];
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
    // $work->category = "anime";
    // $work->title = $annict_data->data->searchWorks->edges[0]->node->title;
    // $work->image = $annict_data->data->searchWorks->edges[0]->node->image->facebookOgImageUrl;
    // $work->copyright = $annict_data->data->searchWorks->edges[0]->node->image->copyright;
    // $work->url = $annict_data->data->searchWorks->edges[0]->node->officialSiteUrl;
    // $work->media = $annict_data->data->searchWorks->edges[0]->node->media;
    // $work->save();
  }
}
