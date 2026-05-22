@extends('layouts.app_admin') 

@section('content')
    <h1>Одобрить отзыв</h1>

    <p>Вы уверены, что хотите одобрить этот отзыв?</p>
    <form action="{{ route('admin.reviews.approve', $review->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Одобрить отзыв</button>
    </form>
@endsection