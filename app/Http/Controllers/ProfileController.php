<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id=auth()->id();
        $user = User::findOrFail($id);
        $posts = $user->posts()->get();
        $profpic = $user->profpic()->get();
        return view('profile', ['user' => $user, 'posts' => $posts, 'profpic' => $profpic]);
    }
}
