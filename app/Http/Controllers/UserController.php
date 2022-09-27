<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index() {
        $id = Auth::id();
        $user = User::find($id);


        return Inertia::render(
            'User/Mypage',
            ['user' => $user]
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

        return back();
    }

    public function destroy() {
        $user = Auth::user();
        $user->delete();
        return to_route('/');
    }
}
