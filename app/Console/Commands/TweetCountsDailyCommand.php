<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Models\TweetCount;
use App\Models\Work;
use Illuminate\Support\Facades\DB;

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
        //ツイート数取得
        $consumer_key = config('twitter.twitter-api');
        $consumer_secret = config('twitter.twitter-api-secret');
        $access_bearer = config('twitter.bearer-token');
        $connection = new TwitterOAuth($consumer_key, $consumer_secret, null, $access_bearer);
        //APIバージョン指定
        $connection->setApiVersion("2");

        //作品カウント
        //DBから作品情報取得
        $works = Work::get()->toArray();

        //タイトルのみ「:」を空白に置換
        $serch = ['　',':', '<', '>', '―', '‐', 'Ⅴ', '[', ']', '≪', '≫', '&', '〜', '！', '・', '∞'];
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
                $twitter_requests[] = $connection->get('tweets/counts/recent', $params);

                //statusプロパティがあった場合はAPI制限になったので15分スリープ
                if (isset($twitter_requests[$index]->status)) {
                    sleep(900);
                    //429エラーがあった配列に入れ直す
                    $twitter_requests[$index] = $connection->get('tweets/counts/recent', $params);
                }
        }

        // work_idで検索し、取得したツイート数をdaily_tweetに「上書き」
        foreach ($twitter_requests as $work_id => $count_result) {
                TweetCount::updateOrCreate(['work_id' => $work_id + 1],
                ['daily_tweet' => $count_result->meta->total_tweet_count ?? null]);
        }

        // 更新後のdaily_tweetをweekly_tweet,monthly_tweetに「加算」
        //週初めはweekly_tweetリセット、月初めはmonthly_tweetリセットしてから加算
        TweetCount::where('work_id', $work_id + 1)->update([
            'weekly_tweet' => 'daily_tweet + weekly_tweet',
            'monthly_tweet' => 'daily_tweet + monthly_tweet',
        ]);
    }
}
