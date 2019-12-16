@extends('layouts.app')

@section('content')
<div class="containter">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    You do not have permission to access this page.
                </div>

                @php
                    header("refresh:5; url= http://postr.test");
                @endphp
            </div>
        </div>
    </div>
</div>
@endsection 