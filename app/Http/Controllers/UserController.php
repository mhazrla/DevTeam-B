<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\ReadingList;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserSettingRequest;
use App\Models\Like;

class UserController extends Controller
{
    public function dashboard(User $user)
    {
        $posts = Post::where('user_id', auth()->user()->id)->latest()->with(['tags', 'category', 'user', 'likes'])->get();
        $totalLikes = Like::whereIn('user_id', [auth()->user()->id])->count();


        return view('users.dashboard', compact([
            'posts',
            'user',
            'totalLikes'
        ]));
    }


    public function updatepassword(Request $request)
    {
        $user = User::find(Auth::id());
        $request->validate([
            'old_password' => [
                Rule::when($user->username == null, 'nullable', 'required'),
                'current_password'
            ],
            'new_password' => 'required',
            'new_password_confirmation' => 'required|same:new_password',
        ]);
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('status', 'Password Changed!');
    }

    public function updatedata(UserUpdateRequest $request, User $user)
    {
        $data = $request->validated();
        if ($request->has('img')) {
            !is_null($user->img) && Storage::delete($user->img);
            $data['img'] = $request->file('img')->store('users');
        }

        $user->update($data);
        return back()->with('status', 'Update data successfully');
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
