<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
use Inertia\Inertia;


class TweetCountsController extends Controller
{
    //ツイート数検索
    public function index(Request $request) {
        $consumer_key = config('twitter.twitter-api'); 
        $consumer_secret = config('twitter.twitter-api-secret'); 
        $access_bearer = config('twitter.bearer-token'); 
        $connection = new TwitterOAuth($consumer_key, $consumer_secret, null, $access_bearer);
        //APIバージョン指定
        $connection->setApiVersion("2");

        //クエリ
        //アニメはDBから、漫画はスクレイピングしたタイトル名で検索
        $query = 'アングリーバード';
        $params = [
        "query" => $query,
        "start_time" => "2022-07-08T00:00:00+09:00",
        "end_time" => "2022-07-09T00:00:00+09:00",
        "granularity" => "day",
        ];

         $twitterRequest = $connection->get('tweets/counts/recent', $params); 
       

            return inertia::render('Twitter',['twitter' => $twitterRequest]);
        }
    }

