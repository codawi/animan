<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Work;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AnimeController extends Controller
{
    public function indexDaily()
    {
        dd(date(DATE_ATOM, strtotime("yesterday + 1day")));
        //アニメランキングソート
        $anime_ranking = Work::where('category', 'anime')->withCount(['count AS total_daily_count' => function ($query) {
            $query->select(DB::raw("SUM(daily_tweet) as daily_count_sum"));
        }])->orderByDesc('total_daily_count')->take(10)->get();

        //ログイン判定
        if (Auth::check()) {
            //ブックマーク済みか作品ごとに確認
            foreach ($anime_ranking as $anime_id) {
                $is_bookmark[] = Auth::user()->is_bookmark($anime_id->id);
            }
        } else {
            $is_bookmark[] = null;
        }

        return Inertia::render(
            'Anime/DailyRanking',
            ['works' => $anime_ranking, 'is_bookmark' => $is_bookmark]
        );
    }

    public function indexWeekly()
    {
        // $anime_ranking = Work::with('count')->where('category', 'anime')->get();
        // $anime_ranking = $anime_ranking->sortByDesc('count.daily_tweet')->take(10)->toArray();

        // $anime_ranking = array_merge($anime_ranking);

        // return Inertia::render(
        //     'Anime/WeeklyRanking',
        //     ['animeWorks' => $anime_ranking]
        // );
    }

    public function indexMonthly()
    {
        // $anime_ranking = Work::with('count')->where('category', 'anime')->get();
        // $anime_ranking = $anime_ranking->sortByDesc('count.daily_tweet')->take(10)->toArray();

        // $anime_ranking = array_merge($anime_ranking);

        // return Inertia::render(
        //     'Anime/MonthlyRanking',
        //     ['animeWorks' => $anime_ranking]
        // );
    }
}
