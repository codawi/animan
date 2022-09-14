<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
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

        if ($exists && $work->category === 'anime') {
            return to_route('anime.review.show', $work->id);
        } elseif ($exists && $work->category === 'comic') {
            return to_route('comic.review.show', ['id' => $id]);
        }

        $is_bookmark = Auth::user()->is_bookmark($id);

        return Inertia::render(
            'Work/Review/Create',
            ['work' => $work, 'is_bookmark' => $is_bookmark]
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
            'review' => ['max:1200'],
            'rating_value' => ['required'],
        ]);

        //認証しているユーザーが同じ作品のレビューを投稿しているかチェック
        $exists = Review::where('user_id', Auth::id())
            ->where('work_id', $request->work_id)
            ->exists();

        if ($exists) {
            return;
        }

        $input = ['user_id' => Auth::id(), 'work_id' => $request->work_id, 'review' => $request->review, 'rating_value' => $request->rating_value];

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

        $is_bookmark = Auth::user()->is_bookmark($id);

        return Inertia::render(
            'Work/Review/Show',
            ['work' => $work, 'review' => $review, 'is_bookmark' => $is_bookmark]
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

        $review = Review::with('user:id,name')->where('work_id', $id)->where('user_id', Auth::id())->first(['review', 'rating_value']);

        $is_bookmark = Auth::user()->is_bookmark($id);

        return Inertia::render(
            'Work/Review/Edit',
            ['work' => $work, 'review' => $review, 'is_bookmark' => $is_bookmark]
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

        //配列バリデーション
        $validator = Validator::make($request->all(), [
            'review.review' => ['max:1200'],
            'review.rating_value' => ['required'],
        ])->safe()->all();

        $input = Review::where('work_id', $id)->where('user_id', Auth::id())->first();
        $input->review = $validator['review']['review'];
        $input->rating_value = $validator['review']['rating_value'];

        $input->update();
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
        return redirect()->action([WorkController::class, 'index'], ['id' => $id]);
    }
}
