<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function dashboard()
    {
        $posts = Post::latest()->with(['tags', 'category', 'user'])->get();

        return view('users.dashboard', compact('posts'));
    }
}
