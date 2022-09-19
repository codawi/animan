<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;


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
}
