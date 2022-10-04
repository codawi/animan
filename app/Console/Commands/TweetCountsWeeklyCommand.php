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
        // 毎週（月曜日）すること（毎月1日以外）
        // 週間カラムにある2週間前のツイート数を月間カラムに「足す」
        // →月曜日に日付が変わったら先日のツイート数を作品別に取得（毎日やることと同じ）
        // →日間と週間ツイート数をリセットするために日間と週間カラムどちらも先日のツイート数で「上書き」
    }
}
