@extends('layouts.app')

@section('title', 'Edit Phone Number')

@section('content')

<div class="card" style="width:800px; margin-left:20px">
    <div class="card-header">
        Edit Phone Number
    </div>
    <div class="card-body">
        @php
        use App\User;
            $user = User::findOrFail(auth()->id());
        @endphp

<form method="POST" action="{{ route('phones.update', ['phone_id' => $phone->id] )}} ">
    @csrf
    <p>Phone Number: <input type="text" name="phone"
        value="{{ $user->phone->phone }}" class="form-control"></p>
    <input type="submit" value="Edit Phone Number" class="btn btn-primary">
    <a href="{{ route('profile') }}">Cancel</a>
</form>
    </div>
</div>

@endsection