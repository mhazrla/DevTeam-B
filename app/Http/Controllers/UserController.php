<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function dashboard(User $user)
    {
        $posts = Post::latest()->with(['tags', 'category', 'user', 'likes'])->get();

        return view('users.dashboard', compact([
            'posts',
            'user'
        ]));
    }
}
