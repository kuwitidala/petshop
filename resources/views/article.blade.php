@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow-sm border-0 p-4">

        <h1 class="text-success mb-3">
            {{ $article->title }}
        </h1>

        <p style="font-size: 18px; line-height: 1.7;">
            {{ $article->content }}
        </p>

        <a href="{{ url('/articles') }}" class="btn btn-outline-success mt-3">
            ← Назад
        </a>

    </div>

</div>

@endsection