<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Work;

class WorkController extends Controller
{
    public function showAnime($id) {
        $animeWork = Work::where('id', $id)->where('category', 'anime')->first()->toArray();
        $reviews = Review::with('user:id,name')->where('work_id', $id)->get()->toArray();
        return Inertia::render(
            'Work/Anime',
            ['work' => $animeWork, 'reviews' => $reviews]
        );
    }

    public function showComic($id) {
        $comicWork = Work::where('id', $id)->where('category', 'comic')->first()->toArray();
        $reviews = Review::with('user:id,name')->where('work_id', $id)->get()->toArray();
        return Inertia::render(
            'Work/Comic',
            ['work' => $comicWork, 'reviews' => $reviews]
        );
    }
}
