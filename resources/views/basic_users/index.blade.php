@extends('layouts.app')

@section('title', 'BasicUsers')

@section('content')
    <p>Users:</p>
    <ul>
        @foreach ($basic_users as $basic_user)
            <li>{{ $basic_user->username }}</li>
        @endforeach
    </ul>
@endsection