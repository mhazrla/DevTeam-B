<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $request->validated();

        // get session
        if (!auth()->attempt($request->only('email', 'password'), $request->remember_me)) {
            return back()->with('status', 'Invalid login details');
        }

        return redirect()->route('dashboard');
    }
}
