<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Work;
use Illuminate\Queue\Events\WorkerStopping;

class IndexController extends Controller
{
    public function index()
    {
        $anime_works = Work::where('id', '4')->first();
        return Inertia::render('Work/index',
    ['animeWorks' => $anime_works]);
        
    }
}
