@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center mb-4">Текущие акции и скидки</h1>
    <div class="stock-contain" id="stock-contain">
        @forelse($stocks as $stock)
                    <div class="stock-card">
                        <img src="{{ asset('images/stocks/' . $stock->image) }}" alt="{{ $stock->title }}">
                        <div class="card-stock-content">
                            <h6>{{ $stock->title }}</h6>
                            <p>{{ $stock->description }}</p>
                        </div>
                    </div>
        @empty
            <p class="text-center">Акций пока нет</p>
        @endforelse
        </div>
</div>
@endsection