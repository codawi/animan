<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Abraham\TwitterOAuth\TwitterOAuth;

class TweetCount extends Model
{
    use HasFactory;


    //ツイート数取得
    public function tweetDailyCount()
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
        foreach ($titles as $index => $title) {
            $works[$index]["title"] = str_replace($serch, '', $title);
        }

        //検索ループ
        foreach ($works as $index => $work) {
            $params = [
                "query" => $work['title'],
                "start_time" => "2022-07-28T00:00:00+09:00",
                "end_time" => "2022-07-29T00:00:00+09:00",
                "granularity" => "day",
            ];
            $twitter_requests[] = $connection->get('tweets/counts/recent', $params);
        }

        //15分間スリープ
        sleep(900);

        //漫画作品カウント
        //DBから漫画作品情報取得
        $works = Work::where('category', 'comic')->get()->toArray();

        $serch = [':', '<', '>', '―', '‐', 'Ⅴ', '[', ']', '≪', '≫', '&'];
        $titles = array_column($works, 'title');
        foreach ($titles as $title) {
            $works[$index]["title"] = str_replace($serch, '', $title);
        }

        foreach ($works as $work) {
            $params = [
                "query" => $work['title'],
                "start_time" => "2022-07-28T00:00:00+09:00",
                "end_time" => "2022-07-29T00:00:00+09:00",
                "granularity" => "day",
            ];
            $twitter_requests[] = $connection->get('tweets/counts/recent', $params);

        }
        $this->tweetCountStore($twitter_requests);
    }

    //ツイート数をDBに保存
    protected $fillable = ['work_id', 'daily_tweet'];
    public function tweetCountStore($count_results)
    {
        foreach ($count_results as $index => $count_result) {
            TweetCount::create([
                'work_id' => $index + 1,
                'daily_tweet' => $count_result->meta->total_tweet_count
            ]);
        }
    }
}
