<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('home', [
            'featuredPosts' => Post::published()->featured()->latest('published_at')->take(3)->get(),
            'latestPosts' => Post::published()->latest('published_at')->take(9)->get(),
        ]);
    }
}
