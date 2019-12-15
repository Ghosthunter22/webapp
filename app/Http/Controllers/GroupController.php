<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::paginate(12);
        return view('groups.index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::findOrFail($id);
        $users = $group->users()->paginate(5);
        return view('groups.show', ['group' => $group, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function userJoin($group_id, $user_id)
    {
        $group = Group::findOrFail($group_id);
        $user = User::findOrFail($user_id);

        $group->users()->attach($user);

        session()->flash('message', 'Joined Group.');
        return redirect()->route('groups.show', ['group_id' => $group_id]);
    }

    public function userLeave($group_id, $user_id)
    {
        $group = Group::findOrFail($group_id);
        $user = User::findOrFail($user_id);

        $group->users()->detach($user);

        session()->flash('message', 'Left Group.');
        return redirect()->route('groups.show', ['group_id' => $group_id]);
    }
}
