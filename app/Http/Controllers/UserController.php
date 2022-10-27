<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserNameUpdateRequest;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index() {
        $id = Auth::id();
        $user_name = User::where('id', $id)->first('name');

        return Inertia::render(
            'User/Mypage',
            ['user' => $user_name]
        );
    }

    public function edit() {
        $user = Auth::user();

        return Inertia::render(
            'User/Profile',
            ['user' => $user]
        );
    }

    public function update(UserUpdateRequest $request) {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->new_password);

        $user->update();

        return back()
        ->with([
            'message' => 'ユーザー情報を更新しました',
            'status' => 'success'
        ]);
    }

    public function nameUpdate(UserNameUpdateRequest $request) {
        $user = Auth::user();
        $user->name = $request->name;

        $user->update();

        return back()
        ->with([
            'message' => 'ユーザー名を更新しました',
            'status' => 'success'
        ]);
    }

    public function destroy() {
        $user = Auth::user();
        $user->delete();
        return to_route('home')
        ->with([
            'message' => 'アカウントを削除しました',
            'status' => 'danger'
        ]);
    }
}
