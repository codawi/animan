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

        //検索ワード
        $query = 'アングリーバード';
        $params = [
        "query" => $query,
        ];

        //クエリ
         $twitterRequest = $connection->get('tweets/counts/recent', $params); 
       

            return inertia::render('Twitter',['twitter' => $twitterRequest]);
        }
    }

