@extends('layouts.app')
@section('content')
<div class="orders-page">
    <div class="orders-container">
        <h2 class="h2-about">Оформленные заказы</h2>
        <div class="orders-list">
            <div class="order-card">
            @foreach($orders as $order)
                <div class="order-top">
                    <div class="order-status"><strong>В обработке</strong></div>
                </div>
                <div class="order-products">
                    @foreach($order->items as $item)
                    <div class="order-product">
                        <img src="{{ asset('images/products/' . $item->product->image) }}" class="order-img">
                        <div class="order-info">
                            <div class="order-name">{{ $item->product->title }}</div>
                            <div class="order-meta">{{ $item->quantity }}</div>
                        </div>
                        <div class="order-price">{{ $item->price}} ₽</div>
                    </div>
                    @endforeach
                </div>
                <div class="order-bottom">
                    <div class="order-total">
                        Итого: <span>{{ $order->total }} ₽</span>
                    </div>

                    <div class="order-address">
                        Адрес: {{ $order->address }}
                    </div>
                </div>
            @endforeach
            </div>

            {{-- <p class="empty">У вас пока нет заказов</p> --}}

        </div>

    </div>
</div>

@endsection