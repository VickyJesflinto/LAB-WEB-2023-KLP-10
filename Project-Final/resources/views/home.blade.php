@extends('layouts.app')
<style>

    main {
        background-color:darkslategray
    }

    .title-word {
        animation: color-animation 2s linear infinite;
    }

    .title-word-1 {
        --color-1: darkgray;
        --color-2: gray;
        --color-3: #3AA6B9;
    }

    .title-word-2 {
        --color-1: #3AA6B9;
        --color-2: #E95793;
        --color-3: #FF7676;
    }

    .title-word-3 {
        --color-1: #FF7676;
        --color-2: #3AA6B9;
        --color-3: #E95793;
    }

    .title-word-4 {
        --color-1: #623911;
        --color-2: #8557e9;
        --color-3: #5cbd46;
    }

    @keyframes color-animation {
        0% {
            color: var(--color-1);
        }

        32% {
            color: var(--color-1);
        }

        33% {
            color: var(--color-2);
        }

        65% {
            color: var(--color-2);
        }

        66% {
            color: var(--color-3);
        }

        99% {
            color: var(--color-3);
        }

        100% {
            color: var(--color-1);
        }
    }

    .title {
        text-align: center;
        font-family: "Montserrat", sans-serif;
        font-weight: bold;
        font-size: 40px;
        position: absolute;
        top: 50%;
        left: 60%;
        transform: translate(-50%, -50%);
    }

    .bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        z-index: -1;
    }
</style>

@section('content')
<div class="bg"></div>
<div class="main">
    <h3 class="title mb-5 mt-5">
        <span class="title-word title-word-1">WELCOME</span>
        <span class="title-word title-word-2"> TO </span><br>
        <span class="title-word title-word-3">- E-Clothes </span>
        <span class="title-word title-word-4">Toko KW -</span><br>
        <br>
        <a href="/products" class="btn btn-dark">Mulai Berbelanja</a>
    </h3>
</div>
@endsection
    