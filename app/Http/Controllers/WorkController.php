<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Work;

class WorkController extends Controller
{
    public function showAnime($id) {
        $animeWork = Work::where('id', $id)->where('category', 'anime')->first()->toArray();
        return Inertia::render(
            'Work/Anime',
            ['work' => $animeWork]
        );
    }

    public function showComic($id) {
        $comicWork = Work::where('id', $id)->where('category', 'comic')->first()->toArray();
        return Inertia::render(
            'Work/Comic',
            ['work' => $comicWork]
        );
    }
}
