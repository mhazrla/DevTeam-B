<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with(['tags', 'category', 'user', 'likes', 'readingLists'])->get();

        return view('home', compact('posts'));
    }
}
