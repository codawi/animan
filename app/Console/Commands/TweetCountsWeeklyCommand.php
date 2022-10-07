<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TweetCountsWeeklyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:TweetCountsWeekly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '週に一度行う作品のツイート数を取得するコマンド';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //週初めと月初めそれぞれのカラムをリセット
        if (date('N') === 1 && date('Y-m-01')) {
            TweetCount::update([
                'weekly_tweet' => 0,
                'monthly_tweet' => 0,
            ]);
        } elseif (date('N') === 1) {
            TweetCount::update([
                'weekly_tweet' => 0,
            ]);
        } elseif (date('Y-m-01')) {
            TweetCount::update([
                'monthly_tweet' => 0,
            ]);
        }
    }
}
