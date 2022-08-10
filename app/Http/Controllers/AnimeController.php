<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Work;

class AnimeController extends Controller
{
    public function indexDaily()
    {
        //アニメランキングソート
        $anime_ranking = Work::with('count')->where('category', 'anime')->get();
        $anime_ranking = $anime_ranking->sortByDesc('count.daily_tweet')->take(10)->toArray();

        //ランキングを1位から表示するために連番に振り直す
        $anime_ranking = array_merge($anime_ranking);

        return Inertia::render(
            'Anime/DailyRanking',
            ['animeWorks' => $anime_ranking]
        );
    }
}
