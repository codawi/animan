<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleLoginController extends Controller
{
        public function redirectToGoogle()
        {
            return Socialite::driver("google")->redirect();
        }

    
        public function handleGoogleCallback()
        {
            //googleのユーザー情報を取得
            $google_user = Socialite::driver('google')->stateless()->user();
            //メールアドレスが一致するユーザーを取得
            $user = User::where('email', $google_user->email)->first();
            //一致するユーザーがいなければ新規ユーザーで作成
            if($user === null) {
                $user = $this->createUser($google_user);
            }

            //ログインしてリダイレクト
            Auth::login($user, true);
            return to_route('home');
        }

        public function createUser($googleUser)
        {
            $user = User::create([
                'name'     => $googleUser->name,
                'email'    => $googleUser->email,
                'password' => Hash::make(uniqid()),
            ]);
            return $user;
        }
}
