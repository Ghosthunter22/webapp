@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!

                    <h3 style="margin-top:20px">
                    Welcome back <b>{{ Auth::user()->name }}</b>!
                    </h3>

                    You will be redirected in 5 seconds...
                    @php
                        header("refresh:5; url= http://postr.test");
                    @endphp
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
