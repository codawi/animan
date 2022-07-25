<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
use Inertia\Inertia;
use App\Models\Work;

class TweetCountsController extends Controller
{
    //ツイート数検索
    public function index(Request $request)
    {
        $consumer_key = config('twitter.twitter-api');
        $consumer_secret = config('twitter.twitter-api-secret');
        $access_bearer = config('twitter.bearer-token');
        $connection = new TwitterOAuth($consumer_key, $consumer_secret, null, $access_bearer);
        //APIバージョン指定
        $connection->setApiVersion("2");

        //アニメ作品カウント
        //DBからアニメ作品情報取得
        $works = Work::where('category', 'anime')->get()->toArray();

        //タイトルのみ「:」を空白に置換
        $serch = [':', '<', '>', '―', '‐', 'Ⅴ', '[', ']', '≪', '≫', '&'];
        $titles = array_column($works, 'title');
        foreach($titles as $index => $title) {
            $works[$index]["title"] = str_replace($serch, '', $title);
        }

        //検索ループ
        foreach($works as $index => $work) {
        $params = [
            "query" => $work['title'],
            "start_time" => "2022-07-19T00:00:00+09:00",
            "end_time" => "2022-07-20T00:00:00+09:00",
            "granularity" => "day",
        ];
        $twitter_request[] = $connection->get('tweets/counts/recent', $params);
    }

        //15分間スリープ
        sleep(900);

        //漫画作品カウント
        //DBから漫画作品情報取得
        $works = Work::where('category', 'comic')->get()->toArray();

        $serch = [':', '<', '>', '―', '‐', 'Ⅴ', '[', ']', '≪', '≫', '&'];
        $titles = array_column($works, 'title');
        foreach($titles as $index => $title) {
            $works[$index]["title"] = str_replace($serch, '', $title);
        }

        foreach($works as $index => $work) {
        $params = [
            "query" => $work['title'],
            "start_time" => "2022-07-19T00:00:00+09:00",
            "end_time" => "2022-07-20T00:00:00+09:00",
            "granularity" => "day",
        ];
        $twitter_request[] = $connection->get('tweets/counts/recent', $params);
    }

    dd($twitter_request);


        return inertia::render('Twitter', ['twitter' => $twitter_request]);
    }
}
