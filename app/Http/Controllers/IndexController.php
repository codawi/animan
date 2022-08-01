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
        $anime_works = Work::where('category', 'anime')->take(10)->get();
        $comic_works = Work::where('category', 'comic')->take(10)->get();
        $anime_ranking = TweetCount::orderBy('daily_tweet', 'desc')->with('work')->take(10)->get()->toArray();
        dd($anime_ranking);
        
        return Inertia::render('Work/index',
    ['animeWorks' => $anime_works, 'comicWorks' => $comic_works]);
        
    }
}
