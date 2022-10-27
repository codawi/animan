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
    protected $signature = 'command:TweetCounts';

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

        //DBから作品情報取得(3文字以下のタイトルの作品は除く)
        $works = Work::whereRaw('CHAR_LENGTH(title) > 3')->get()->toArray();

        //APIで検索が出来ない記号を空白に変換
        $serch = [':', '<', '>', '―', '‐', 'Ⅴ', '[', ']', '≪', '≫', '&', '〜', '！', '・', '∞'];
        $titles = array_column($works, 'title');
        foreach ($titles as $index => $title) {
            $works[$index]["title"] = str_replace($serch, '', $title);
        }

        //ツイート検索
        foreach ($works as $index => $work) {
            $params = [
                "query" => "$work[title] lang:ja",
                "start_time" => date(DATE_ATOM, strtotime("yesterday")),
                "end_time" => date(DATE_ATOM, strtotime("yesterday + 1day")),
                "granularity" => "day",
            ];
            $twitter_requests[] = $connection->get('tweets/counts/recent', $params);

            //statusプロパティがあった場合はAPI制限になっている為15分スリープ
            if (isset($twitter_requests[$index]->status)) {
                sleep(900);
                //429エラーがあった配列に入れ直す
                $twitter_requests[$index] = $connection->get('tweets/counts/recent', $params);
            }
        }

        //日間ツイート数リセット、週初めの場合週間カラム、月初めの場合月間カラムリセット
        DB::table('tweet_counts')->update(['daily_tweet' => 0]);
        if (date('N') === "1" && date('Y-m-01') === date('Y-m-d')) {
            DB::table('tweet_counts')->update(['weekly_tweet' => 0, 'monthly_tweet' => 0]);
        } elseif (date('N') === "1") {
            DB::table('tweet_counts')->update(['weekly_tweet' => 0]);
        } elseif (date('Y-m-01') === date('Y-m-d')) {
            DB::table('tweet_counts')->update(['monthly_tweet' => 0]);
        }

        //ツイート数保存
        foreach ($works as $index => $work) {
            TweetCount::updateOrCreate(
                ['work_id' => $work['id']],
                ['daily_tweet' => $twitter_requests[$index]->meta->total_tweet_count ?? 0]
            );
            //更新後のdaily_tweetをweekly_tweet,monthly_tweetに「加算」
            TweetCount::where('work_id', $work['id'])->update([
                'weekly_tweet' => DB::raw('daily_tweet + weekly_tweet'),
                'monthly_tweet' => DB::raw('daily_tweet + monthly_tweet'),
            ]);
        }
    }
}
