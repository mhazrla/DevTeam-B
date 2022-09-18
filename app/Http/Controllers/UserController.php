<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function settings(User $user)
    {

        return view('users.settings', compact('user'));
    }

    public function updatepassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required',
            'new_password_confirmation' => 'required|same:new_password',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('status', 'Password Changed!');
    }

    public function readinglist(User $user)
    {
        $posts = Post::latest()->with(['tags', 'category', 'user', 'likes'])->get();

        return view('users.readinglist', compact([
            'posts',
            'user'
        ]));
    }
}
