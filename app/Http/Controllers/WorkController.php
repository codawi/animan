<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Work;
use App\Models\Review;
use App\Models\Bookmark;

use function PHPUnit\Framework\isEmpty;

class WorkController extends Controller
{
    public function showAnime($id) {
        $animeWork = Work::where('id', $id)->where('category', 'anime')->first();
        $reviews = Review::with('user:id,name')->where('work_id', $id)->get();
        $is_bookmark = Auth::user()->is_bookmark($id);
        return Inertia::render(
            'Work/Anime',
            ['work' => $animeWork, 'reviews' => $reviews, 'is_bookmark' => $is_bookmark]
        );
    }

    public function showComic($id) {
        $comicWork = Work::where('id', $id)->where('category', 'comic')->first();
        $reviews = Review::with('user:id,name')->where('work_id', $id)->get();
        $is_bookmark = Auth::user()->is_bookmark($id);
        return Inertia::render(
            'Work/Comic',
            ['work' => $comicWork, 'reviews' => $reviews, 'is_bookmark' => $is_bookmark]
        );
    }
}
