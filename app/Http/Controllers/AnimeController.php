<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Work;
use Illuminate\Support\Facades\DB;


class AnimeController extends Controller
{
    public function indexDaily()
    {
        //アニメランキングソート
        $anime_ranking = Work::where('category', 'anime')->withCount(['count AS total_daily_count' => function ($query) {
            $query->select(DB::raw("SUM(daily_tweet) as daily_count_sum"));
        }])->orderByDesc('total_daily_count')->take(10)->get();
        // $is_bookmark = Auth::user()->is_bookmark($anime_ranking['id']);

        return Inertia::render(
            'Anime/DailyRanking',
            ['animeWorks' => $anime_ranking]
        );
    }

    public function indexWeekly() {
        // $anime_ranking = Work::with('count')->where('category', 'anime')->get();
        // $anime_ranking = $anime_ranking->sortByDesc('count.daily_tweet')->take(10)->toArray();

        // $anime_ranking = array_merge($anime_ranking);

        // return Inertia::render(
        //     'Anime/WeeklyRanking',
        //     ['animeWorks' => $anime_ranking]
        // );
    }

    public function indexMonthly() {
        // $anime_ranking = Work::with('count')->where('category', 'anime')->get();
        // $anime_ranking = $anime_ranking->sortByDesc('count.daily_tweet')->take(10)->toArray();

        // $anime_ranking = array_merge($anime_ranking);

        // return Inertia::render(
        //     'Anime/MonthlyRanking',
        //     ['animeWorks' => $anime_ranking]
        // );
    }
}
