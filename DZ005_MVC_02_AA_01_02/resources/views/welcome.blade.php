@extends('layouts.master')

@section('title', 'Laravel APP')

@section('content')
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}" class="logout-btn btn px-5" onclick="event.preventDefault();this.closest('form').submit();">
            Odjava
        </a>
    </form>
    <div class="w-100 home-wrap flex-center flex-column py-5">
        <h1 class="w-100 text-center">
            <strong>Dobrodošli!</strong>
        </h1>   
        
        <div class="w-100 welcome-nav mt-5">
            <a href="/students">Studenti</a>
            <a href="/professors">Profesori</a>
            <a href="/courses">Predmeti</a>
            <a href="/departments">Odjeli</a>
            <a href="/faculties">Fakulteti</a>
        </div>
    </div>

    <style>
        .home-wrap {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .logout-btn {
            position: absolute;
            right: 20px;
            top: 20px;
            background: rgba(211, 211, 211, .3);
        }
        .welcome-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .welcome-nav a {
            background: lightgray;
            padding: 20px 60px;
        }

        @media(max-width: 1080px) {
            .welcome-nav {
                flex-direction: column;
            }

            .welcome-nav a {
                width: 100%;
                margin-bottom: 20px;
                text-align: center;
            }
        }
    </style>
@stop