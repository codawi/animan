<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Work;
use App\Models\Review;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\isEmpty;

class WorkController extends Controller
{
    public function index($id)
    {
        $work = Work::where('id', $id)->first();
        
        //作品のレビューを全件取得
        $reviews = Review::with('user:id,name')->where('work_id', $id)->paginate();
        
        //ログイン判定
        if (Auth::check()) {
            //ブックマーク済みか作品ごとに確認
            $is_bookmark = Auth::user()->is_bookmark($id);
        } else {
            $is_bookmark = null;
        }

        return Inertia::render(
            'Work/Work',
            ['work' => $work, 'reviews' => $reviews, 'is_bookmark' => $is_bookmark]
        );
    }

    public function search($query_word)
    {
        $works = Work::Where(
            'title',
            'like',
            '%' . $query_word . '%'
        )->paginate();

        //多次元データの為ただonlyを使っただけでは空だったのでmapで繰り返し処理
        if($works->isNotEmpty()) {
        $works_id = $works->map(function ($row) {
            return $row->only('id');
        });
    }

        if (Auth::check() && $works->isNotEmpty()) {
            foreach ($works_id as $work_id) {
                $is_bookmark = Auth::user()->is_bookmark($work_id);
            }
        } else {
            $is_bookmark = null;
        }


        return Inertia::render(
            'SearchResults',
            [
                'works' => $works, 'is_bookmark' => $is_bookmark
            ]
        );
    }
}
