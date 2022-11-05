<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Review;
use App\Models\Bookmark;

class GuestUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:GuestUser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ゲストユーザーの投稿とブックマークを削除する';

    /**
     * Execute the console command.
     *
     * @return int
     */
    private const GUEST_USER_ID = 4;

    public function handle()
    {
        //ゲストユーザーの全レビュー削除
        $review = Review::where('user_id', self::GUEST_USER_ID)->delete();
        //ブックマーク削除
        $bookmark = Bookmark::where('user_id', self::GUEST_USER_ID)->delete();
    }
}
