<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Work;
use App\Models\Review;
use App\Models\User;


class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function animeReviewCreate($id)
    {
        $animeWork = Work::where('id', $id)->where('category', 'anime')->first()->toArray();
        return Inertia::render(
            'Work/Comic/Review/Create',
            ['work' => $animeWork]
        );
    }

    public function comicReviewCreate($id)
    {
        $comicWork = Work::where('id', $id)->where('category', 'comic')->first()->toArray();
        return Inertia::render(
            'Work/Comic/Review/Create',
            ['work' => $comicWork]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //バリデーション
        $request->validate([
            'rating_value' => ['required'],
            'review' => ['max:1200'],
        ]);
                
                //認証しているユーザーが同じ作品のレビューを投稿しているかチェック
                $exists = Review::where('user_id', Auth::id())
                ->where('work_id', $request->work_id)
                ->exists();
                
                if($exists) {
                    return;
                }
            
        $input = ['user_id' => Auth::id(), 'work_id' => $request->work_id, 'rating_value' => $request->rating_value, 'review' => $request->review ];

        Review::create($input);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function animeReviewShow($id)
    {
        $animeWork = Work::where('id', $id)->where('category', 'anime')->first()->toArray();

        //認証しているユーザーのレビュー投稿を取得
        $review = Review::with('user:id,name')->where('work_id', $id)->where('user_id', Auth::id())->first()->toArray();

        return Inertia::render(
            'Work/Anime/Review/Show',
            ['work' => $animeWork, 'review' => $review]
        );
    }

    public function comicReviewShow($id)
    {
        $comicWork = Work::where('id', $id)->where('category', 'comic')->first()->toArray();

        //認証しているユーザーのレビュー投稿を取得
        $review = Review::with('user:id,name')->where('work_id', $id)->where('user_id', Auth::id())->first()->toArray();

        return Inertia::render(
            'Work/Comic/Review/Show',
            ['work' => $comicWork, 'review' => $review]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AnimeReviewEdit($id)
    {
        $animeWork = Work::where('id', $id)->where('category', 'anime')->first();

        $review = Review::with('user:id,name')->where('work_id', $id)->where('user_id', Auth::id())->first();

        return Inertia::render(
            'Work/Comic/Review/Edit',
            ['work' => $animeWork, 'review' => $review]
        );
    }

    public function ComicReviewEdit($id)
    {
        $comicWork = Work::where('id', $id)->where('category', 'comic')->first();

        $review = Review::with('user:id,name')->where('work_id', $id)->where('user_id', Auth::id())->first();

        return Inertia::render(
            'Work/Comic/Review/Edit',
            ['work' => $comicWork, 'review' => $review]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //バリデーション
        $request->validate([
            'rating_value' => ['required'],
            'review' => ['max:1200'],
        ]);

        $input = Review::where('work_id', $id)->where('user_id', Auth::id())->first();

        $input->user_id = Auth::id();
        $input->work_id = $id;
        $input->rating_value = $request->review['rating_value'];
        $input->review = $request->review['review'];

        $input->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $input = Review::where('work_id', $id)->where('user_id', AUth::id())->first();

        $input->delete();
        return back();
    }
}
