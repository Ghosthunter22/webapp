@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="modal-header">
    <h2>Users:</h2>
</div>
<ul>
    @foreach ($users as $user)
        <div class="card" style="margin-top: 10px; width:250px">
            <a href="{{ route('users.show', ['id' => $user->id]) }}" class="card-header"><img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" width="40" height="40"/>{{ $user->name }}</a>
        </div>
    @endforeach
</ul>
@endsection