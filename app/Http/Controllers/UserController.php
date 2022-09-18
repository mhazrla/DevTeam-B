<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserSettingRequest;
use App\Models\ReadingList;

class UserController extends Controller
{
    public function dashboard(User $user)
    {
        $posts = Post::where('user_id', auth()->user()->id)->latest()->with(['tags', 'category', 'user', 'likes'])->get();

        return view('users.dashboard', compact([
            'posts',
            'user'
        ]));
    }

    public function readinglist(User $user)
    {
        $readingList = ReadingList::where('user_id', auth()->user()->id)->get();

        return view('users.readinglist', compact([
            'readingList',
        ]));
    }

    public function settings(User $user)
    {
        $user = User::all();
        return view('users.settings', compact('user'));
    }
}
