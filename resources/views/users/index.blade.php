@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <p class="card-header">Users:</p>
    <ul>
        @foreach ($users as $user)
            <p class="card-header"><a href="{{ route('users.show', ['id' => $user->id]) }}"><img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" width="40" height="40"/>{{ $user->name }}</a></p>
        @endforeach
    </ul>
    {{-- <a href="{{ route('users.create') }}">Create User</a> --}}
@endsection