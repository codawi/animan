<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


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
}
