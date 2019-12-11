@extends('layouts.app')

@section('title', 'User Details')

@section('content')
    <p>Users:</p>
    <ul>
        <li>Username: {{ $user->username }}</li>
        <li>Name: {{ $user->name }}</li>
        <li>Email: {{ $user->email }}</li>
    </ul>

    <form method="POST"
        action="{{ route('users.destroy', ['id' => $user->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete User</button>
    </form>

    <p><a href="{{ route('animals.index') }}">Back</a></p>
@endsection