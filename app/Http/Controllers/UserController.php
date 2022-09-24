<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Requests\UserUpdateRequest;


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
        dd($request);
    }
}
