<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Work;
use App\Models\Review;


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
    public function create($id)
    {
        $work = Work::where('id', $id)->first();

        //投稿していたら編集画面にリダイレクト
        $exists = Review::where('user_id', Auth::id())
                ->where('work_id', $id)
                ->exists();
                
                if($exists && $work->category === 'anime') {
                    return to_route('anime.review.show', $work->id);
                } elseif($exists && $work->category === 'comic') {
                    return to_route('comic.review.show', ['id' => $id]);
                }

        return Inertia::render(
            'Work/Review/Create',
            ['work' => $work]
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
    public function show($id)
    {
        $work = Work::where('id', $id)->first();

        //認証しているユーザーのレビュー投稿を取得
        $review = Review::with('user:id,name')->where('work_id', $id)->where('user_id', Auth::id())->first();

        return Inertia::render(
            'Work/Review/Show',
            ['work' => $work, 'review' => $review]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = Work::where('id', $id)->first();

        $review = Review::with('user:id,name')->where('work_id', $id)->where('user_id', Auth::id())->first();

        return Inertia::render(
            'Work/Review/Edit',
            ['work' => $work, 'review' => $review]
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
