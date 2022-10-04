<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TweetCountsMonthlyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:TweetCountsMonthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '月に一度行う作品のツイート数を取得するコマンド';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // 毎月すること（毎月1日）
        // 毎月1日に日付が変わったら、先日のツイート数を作品別に取得（毎日やることと同じ）
        // →日間と週間と月間をツイート数をリセットするために全てを先日のツイート数で「上書き」
    }
}
