@extends('layouts.app')

@section('title', 'Groups')

@section('content')
<div class="modal-header">
    <h2>Groups:</h2>
</div>
<ul>
    @foreach ($groups as $group)
    <div class="card" style="margin-top: 10px; width:250px">
        <a href="{{ route('groups.show', ['group_id' => $group->id]) }}" class="card-header">{{ $group->title }}</a>
    </div>
    @endforeach
</ul>
@endsection