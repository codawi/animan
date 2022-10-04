<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Models\TweetCount;
use App\Models\Work;

class TweetCountsDailyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:TweetCountsDaily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '作品の一日のツイート数を取得する';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // 毎日実行すること（月曜日以外）
        // 日間カラムにある2日前のツイート数を週間カラムに「足す」
        // →日付が変わった段階で先日のツイート数を作品別に取得
        // →そのあと先日のツイート数を日間カラムに「上書き」

        // 現在日間カラムにある2日前のツイート数を週間カラムに「足す」
        TweetCount::where('daily_tweet')->sum('weekly_tweet');

        //ツイート数取得
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
        $serch = [':', '<', '>', '―', '‐', 'Ⅴ', '[', ']', '≪', '≫', '&', '〜'];
        $titles = array_column($works, 'title');
        foreach ($titles as $index => $title) {
            $works[$index]["title"] = str_replace($serch, '', $title);
        }

        //検索ループ
        foreach ($works as $index => $work) {
            $params = [
                "query" => $work['title'],
                "start_time" => date(DATE_ATOM, strtotime("yesterday")),
                "end_time" => date(DATE_ATOM, strtotime("yesterday + 1day")),
                "granularity" => "day",
            ];
            try {
                $twitter_requests[] = $connection->get('tweets/counts/recent', $params);
            } catch (\Expection $e) {
                //API制限になった場合15分スリープしてから処理再開
                if ($connection->getLastHttpCode() == 429) {
                    sleep(900);
                    $twitter_requests[] = $connection->get('tweets/counts/recent', $params);
                }
            }
        }

        //漫画作品カウント
        //DBから漫画作品情報取得
        $works = Work::where('category', 'comic')->get()->toArray();

        $serch = [':', '<', '>', '―', '‐', 'Ⅴ', '[', ']', '≪', '≫', '&', '〜'];
        $titles = array_column($works, 'title');
        foreach ($titles as $title) {
            $works[$index]["title"] = str_replace($serch, '', $title);
        }

        //検索ループ
        foreach ($works as $index => $work) {
            $params = [
                "query" => $work['title'],
                "start_time" => date(DATE_ATOM, strtotime("yesterday")),
                "end_time" => date(DATE_ATOM, strtotime("yesterday + 1day")),
                "granularity" => "day",
            ];
            try {
                $twitter_requests[] = $connection->get('tweets/counts/recent', $params);
            } catch (\Expection $e) {
                //API制限になった場合15分スリープしてから処理再開
                if ($connection->getLastHttpCode() == 429) {
                    sleep(900);
                    $twitter_requests[] = $connection->get('tweets/counts/recent', $params);
                }
            }
        }

        //ツイート数をDBに保存
        foreach ($twitter_requests as $index => $count_result) {
            dd($count_result->meta->total_tweet_count);
            TweetCount::where('work_id', $index + 1)
                ->update(['daily_tweet' => $count_result->meta->total_tweet_count]);
        }
    }
}
