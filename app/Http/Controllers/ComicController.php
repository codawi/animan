<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Work;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class ComicController extends Controller
{
    public function indexDaily()
    {
        //漫画ランキングソート
        $comic_ranking = Work::where('category', 'comic')->withCount(['count AS total_daily_count' => function ($query) {
            $query->select(DB::raw("SUM(daily_tweet) as daily_count_sum"));
        }])->orderByDesc('total_daily_count')->paginate(50);

        //ログイン判定
        if (Auth::check()) {
            //ブックマーク済みか作品ごとに確認
            foreach ($comic_ranking as $comic_id) {
                $is_bookmark[] = Auth::user()->is_bookmark($comic_id->id);
            }
        } else {
            $is_bookmark[] = null;
        }

        return Inertia::render(
            'Ranking',
            ['works' => $comic_ranking, 'is_bookmark' => $is_bookmark, 'period' => 'daily', 'category' => 'comic']
        );
    }

    public function indexWeekly()
    {
        $comic_ranking = Work::where('category', 'comic')->withCount(['count AS total_weekly_count' => function ($query) {
            $query->select(DB::raw("SUM(weekly_tweet) as weekly_count_sum"));
        }])->orderByDesc('total_weekly_count')->paginate(50);

        if (Auth::check()) {
            foreach ($comic_ranking as $comic_id) {
                $is_bookmark[] = Auth::user()->is_bookmark($comic_id->id);
            }
        } else {
            $is_bookmark[] = null;
        }

        return Inertia::render(
            'Ranking',
            ['works' => $comic_ranking, 'is_bookmark' => $is_bookmark, 'period' => 'weekly', 'category' => 'comic']
        );
    }

    public function indexMonthly()
    {
        $comic_ranking = Work::where('category', 'comic')->withCount(['count AS total_monthly_count' => function ($query) {
            $query->select(DB::raw("SUM(monthly_tweet) as monthly_count_sum"));
        }])->orderByDesc('total_monthly_count')->paginate(50);

        if (Auth::check()) {
            foreach ($comic_ranking as $comic_id) {
                $is_bookmark[] = Auth::user()->is_bookmark($comic_id->id);
            }
        } else {
            $is_bookmark[] = null;
        }

        return Inertia::render(
            'Ranking',
            ['works' => $comic_ranking, 'is_bookmark' => $is_bookmark, 'period' => 'monthly', 'category' => 'comic']
        );
    }
}
