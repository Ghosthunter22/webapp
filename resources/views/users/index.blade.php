@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <p>Users:</p>
    <ul>
        @foreach ($users as $user)
            {{-- <li>{{ $user->username }}</li> --}}
            {{-- <li><a href="/users/{{ $user->id }}">{{$user->username }}</a></li> --}}
            <li><a href="{{ route('users.show', ['id' => $user->id]) }}">{{ $user->name }}</a></li>
        @endforeach
    </ul>
    <a href="{{ route('users.create') }}">Create User</a>
@endsection