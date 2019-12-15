@extends('layouts.app')

@section('title', 'Add Phone Number')

@section('content')

<div class="card" style="width:800px; margin-left:20px">
    <div class="card-header">
        Add Phone Number
    </div>
    <div class="card-body">

<form method="POST" action="{{ route('phones.store')}}">
    @csrf
    <p>Phone Number: <input type="numerical" name="phone"
        value="{{ old('phone') }}" class="form-control"></p>
    <input type="submit" value="Save Phone Number" class="btn btn-primary">
    <a href="{{ route('profile') }}">Cancel</a>
</form>
    </div>
</div>

@endsection