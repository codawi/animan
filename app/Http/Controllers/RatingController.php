<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //現在認証しているユーザーID取得
        $user_id = Auth::id();

        //バリデーション
        $request->validate([
            'work_id' => 'required',
            'rating_value' => 'required',
            'review' => 'nullable|max:1200',
        ]);

        function($fail) use($request, $user_id) {

        //同じユーザーIDと作品IDで投稿しているかチェック
        $exists = Review::where('user_id', $user_id)
        ->where('work_id', $request->work_id)
        ->exists();

        if($exists) {
            $fail('すでにレビューは投稿済みです');
            return;
        }
    };

        $input = ['user_id' => $user_id, 'work_id' => $request->work_id, 'rating_value' => $request->rating, 'review' => $request->review ];

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
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
