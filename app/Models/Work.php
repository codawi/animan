<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Work extends Model
{
  use HasFactory;

  public $response;

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

    $work = new Work();
    $work->category = "anime";
    $work->title = $annict_data->data->searchWorks->edges[0]->node->title;
    $work->image = $annict_data->data->searchWorks->edges[0]->node->image->facebookOgImageUrl;
    $work->copyright = $annict_data->data->searchWorks->edges[0]->node->image->copyright;
    $work->url = $annict_data->data->searchWorks->edges[0]->node->officialSiteUrl;
    $work->media = $annict_data->data->searchWorks->edges[0]->node->media;
    $work->save();
  }
}
