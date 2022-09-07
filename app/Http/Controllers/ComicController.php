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
        }])->orderByDesc('total_daily_count')->take(10)->get();

        //ブックマーク済みか作品ごとに確認
        foreach ($comic_ranking as $comic_id) {
            $is_bookmark[] = Auth::user()->is_bookmark($comic_id->id);
        }

        return Inertia::render(
            'Comic/DailyRanking',
            ['works' => $comic_ranking, 'is_bookmark' => $is_bookmark]
        );
    }

    public function indexWeekly()
    {
        // $comic_ranking = Work::with('count')->where('category', 'comic')->get();
        // $comic_ranking = $comic_ranking->sortByDesc('count.daily_tweet')->take(10)->toArray();

        // $comic_ranking = array_merge($comic_ranking);

        // return Inertia::render(
        //     'Comic/WeeklyRanking',
        //     ['comicWorks' => $comic_ranking]
        // );
    }

    public function indexMonthly()
    {
        // $comic_ranking = Work::with('count')->where('category', 'comic')->get();
        // $comic_ranking = $comic_ranking->sortByDesc('count.daily_tweet')->take(10)->toArray();

        // $comic_ranking = array_merge($comic_ranking);

        // return Inertia::render(
        //     'Comic/MonthlyRanking',
        //     ['comicWorks' => $comic_ranking]
        // );
    }
}
