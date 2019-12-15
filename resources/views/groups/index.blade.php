@extends('layouts.app')

@section('title', 'Groups')

@section('content')
<div class="modal-header">
    <h2>Groups:</h2>
</div>
<ul class="pagination" style="width:0px">
    <div class="container" style="margin-top:40px;">
    @foreach ($groups as $group)
    <div class="card" style="margin-top: 10px; width:250px">
        <a href="{{ route('groups.show', ['group_id' => $group->id]) }}" class="card-header">{{ $group->title }}</a>
    </div>
    @endforeach
</div>
{{ $groups->links() }}
</ul>
@endsection