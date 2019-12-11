@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <p>Users:</p>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->username }}</li>
        @endforeach
    </ul>
@endsection