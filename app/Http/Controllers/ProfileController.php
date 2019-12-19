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
        // dd($user->phone());
        $posts = $user->posts()->get();
        $groups = $user->groups()->get();
        $phone = $user->phone()->get();
        return view('profile', ['user' => $user, 'posts' => $posts, 'groups' => $groups, 'phone' => $phone]);
    }

    public function update_avatar(Request $request){

        $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = auth()->user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        session()->flash('message', 'Profile picture was updated.');
        return back()
            ->with('success','You have successfully uploaded the image.');

    }
}
