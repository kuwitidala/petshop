@extends('layouts.app_admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Мои заказы</h1>

    @forelse($orders as $order)
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <strong>Заказ #{{ $order->id }}</strong>
                    <span class="text-muted">| {{ $order->created_at }}</span>
                </div>
                <div>
                    <span class="badge bg-primary">{{ $order->total }} ₽</span>
                </div>
            </div>

            <div class="card-body">
                <p><strong>Адрес:</strong> {{ $order->address }}</p>

                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>Изображение</th>
                            <th>Пользователь</th>
                            <th>Товар</th>
                            <th>Количество</th>
                            <th>Цена</th>
                            <th>Итого</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>
                                    <div style="display:flex; align-items:center; gap:10px;">
                                        <img src="{{ asset('/images/products/' . $item->product->image) }}"
                                            style="width:50px; height:50px; object-fit:cover; border-radius:8px;">
                                        
                                        <span>
                                            {{ $item->product->title }}
                                        </span>
                                    </div>
                                </td>
                                <td>{{ $order->user->name ?? '—' }}</td>
                                <td>{{ $item->product->title }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }} ₽</td>
                                <td>{{ $item->price * $item->quantity }} ₽</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @empty
        <div class="alert alert-info">
            У вас пока нет заказов
        </div>
    @endforelse

</div>
@endsection