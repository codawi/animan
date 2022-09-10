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
    public function showAnime($id)
    {
        $anime_work = Work::where('id', $id)->where('category', 'anime')->first();
        $reviews = Review::with('user:id,name')->where('work_id', $id)->get();
        $is_bookmark = Auth::user()->is_bookmark($id);
        return Inertia::render(
            'Work/Anime',
            ['work' => $anime_work, 'reviews' => $reviews, 'is_bookmark' => $is_bookmark]
        );
    }

    public function showComic($id)
    {
        $comic_work = Work::where('id', $id)->where('category', 'comic')->first();
        $reviews = Review::with('user:id,name')->where('work_id', $id)->get();
        $is_bookmark = Auth::user()->is_bookmark($id);
        return Inertia::render(
            'Work/Comic',
            ['work' => $comic_work, 'reviews' => $reviews, 'is_bookmark' => $is_bookmark]
        );
    }

    public function search($query_word)
    {
        $works = Work::Where('title', 'like',
            '%' . $query_word . '%'
        )->get();

        //多次元データの為ただonlyを使っただけでは空だったのでmapで繰り返し処理
        $works_id = $works->map(function($row) {
            return $row->only('id');
        });

        foreach($works_id as $work_id) {
        $is_bookmark = Auth::user()->is_bookmark($work_id);
        }

        return Inertia::render(
            'SearchResults',
            ['works' => $works, 'is_bookmark' => $is_bookmark
        ]);
    }
}
