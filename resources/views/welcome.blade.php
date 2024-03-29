@extends('layouts.app')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Postr</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <a href="{{ route('profile') }}">
                    <button class="btn btn-secondary">
                        Profile
                    </button>
                    </a>
                    @else
                    <a href="{{ route('login') }}">
                    <button class="btn btn-secondary">
                        Login
                    </button>
                    </a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                        <button class="btn btn-secondary">
                            Register
                        </button>
                    </a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Postr
                </div>

                <div class="links">
                    <a href="{{ route('users.index') }}">
                    <button class="btn btn-secondary">
                    Users
                    </button>
                </a>
                <a href="{{ route('posts.index') }}">
                    <button class="btn btn-secondary">
                    Posts
                    </button>
                </a>
                <a href="{{ route('groups.index') }}">
                    <button class="btn btn-secondary">
                    Groups
                    </button>
                </a>
                </div>
            </div>
        </div>
    </body>
</html>
