<?php

namespace App\Http\Controllers;

use App\User;
use App\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'phone' => 'required|numeric'
        ]);
        $user = User::findOrFail(auth()->id());
        $phone = new Phone;
        $phone->phone = $validatedData['phone'];
        $user->phone()->save($phone);
        $user->save();

        session()->flash('message', 'Phone number was added.');
        return redirect()->route('profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($phone_id)
    {
        $phone = Phone::findOrFail($phone_id);

        return view('phones.edit', ['phone' => $phone]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'phone' => 'required|numeric'
        ]);
        $user = User::findOrFail(auth()->id());
        $phone = $user->phone;
        $new_phone = $validatedData['phone'];
        $phone->phone = $new_phone;
        $user->phone()->save($phone);
        $user->save();

        session()->flash('message', 'Phone number was updated.');
        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone = Phone::findOrFail($id);
        $phone->phone=null;
        $user = User::findOrFail(auth()->id());
        // $user->phone()->save($phone);
        $user->phone()->delete();
        $user->save();

        return redirect()->route('profile')->with('message', 'Phone number was deleted.');
    }
}
