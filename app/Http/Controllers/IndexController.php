<?php

namespace App\Http\Controllers;

use App\Models\TweetCount;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Work;
use Illuminate\Queue\Events\WorkerStopping;

class IndexController extends Controller
{
    public function index()
    {
        //アニメランキング
        $anime_ranking = Work::with('count')->where('category', 'anime')->get();
        $anime_ranking = $anime_ranking->sortByDesc('count.daily_tweet')->take(10)->toArray();

        //漫画ランキング
        $comic_ranking = Work::with('count')->where('category', 'comic')->get();
        $comic_ranking = $comic_ranking->sortByDesc('count.daily_tweet')->take(10)->toArray();

        // dd($comic_ranking);
        
        return Inertia::render('Work/index',
    ['animeWorks' => $anime_ranking, 'comicWorks' => $comic_ranking]);
        
    }
}
