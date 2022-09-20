<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;
use App\Models\Work;


class BookmarkController extends Controller
{
    public function store($id) {
        //登録していなければ登録
        $user = Auth::user();
        if(!$user->is_bookmark($id)) {
            $user->bookmark_works()->attach($id);
        }
        return back();
    }

    public function destroy($id) {
        //登録していれば削除
        $user = Auth::user();
        if($user->is_bookmark($id)) {
            $user->bookmark_works()->detach($id);
        }
        return back();
    }

    //ブックマーク一覧
    public function animeIndex() {
        //認証中のユーザーでブックマークしているアニメ作品を取得
        $user_id = Auth::id();

        $anime_bookmarks = Work::select()
        ->join('bookmarks', 'work_id', '=', 'works.id')
        ->where('user_id', $user_id)
        ->where('category', 'anime')
        ->get();

        //ログイン判定
        if (Auth::check()) {
            //ブックマーク済みか作品ごとに確認
            foreach ($anime_bookmarks as $anime_bookmark) {
                $is_bookmark[] = Auth::user()->is_bookmark($anime_bookmark->id);
            }
        } else {
            $is_bookmark = null;
        }

        return Inertia::render(
            'User/Bookmark/Anime',
            ['works' => $anime_bookmarks, 'is_bookmark' => $is_bookmark]
        );
    
    }

    public function comicIndex() {
        //認証中のユーザーでブックマークしているアニメ作品を取得
        $user_id = Auth::id();

        $comic_bookmarks = Work::select()
        ->join('bookmarks', 'work_id', '=', 'works.id')
        ->where('user_id', $user_id)
        ->where('category', 'comic')
        ->get();

        //ログイン判定
        if (Auth::check()) {
            //ブックマーク済みか作品ごとに確認
            foreach ($comic_bookmarks as $comic_bookmark) {
                $is_bookmark[] = Auth::user()->is_bookmark($comic_bookmark->id);
            }
        } else {
            $is_bookmark = null;
        }

        return Inertia::render(
            'User/Bookmark/Comic',
            ['works' => $comic_bookmarks, 'is_bookmark' => $is_bookmark]
        );
    }
}
