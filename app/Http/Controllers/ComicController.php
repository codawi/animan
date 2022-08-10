<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Work;

class ComicController extends Controller
{
    public function indexDaily()
    {
        //漫画ランキングソート
        $comic_ranking = Work::with('count')->where('category', 'comic')->get();
        $comic_ranking = $comic_ranking->sortByDesc('count.daily_tweet')->take(10)->toArray();

        //ランキングを1位から表示するために連番に振り直す
        $comic_ranking = array_merge($comic_ranking);

        return Inertia::render(
            'Comic/DailyRanking',
            ['comicWorks' => $comic_ranking]
        );
    }
}
