@extends('layouts.app_admin')

@section('content')
<h1>Отзыв #{{ $review->id }}</h1>

<p><strong>Автор:</strong> {{ $review->user->name }}</p>
<p><strong>Отзыв:</strong> {{ $review->text }}</p>
<p><strong>Статус:</strong> {{ $review->approved ? 'Одобрен' : 'На рассмотрении' }}</p>

<a href="{{ route('admin.reviews.index') }}">К списку отзывов</a>
@endsection