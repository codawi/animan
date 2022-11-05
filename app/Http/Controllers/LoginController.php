<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (!session()->has('url.intended')) {
            session(['url.intended' => url()->previous()]);
        }
        return redirect('login');
    }

    //ゲストユーザー用ID
    private const GUEST_USER_ID = 4;

    public function guestLogin()
    {
        if (Auth::loginUsingId(self::GUEST_USER_ID)) {
            return to_route('home')
                ->with([
                    'message' => 'ゲストログインしました（投稿やブックマークは翌日削除されます）',
                    'status' => 'success'
                ]);
        }
    }
}
