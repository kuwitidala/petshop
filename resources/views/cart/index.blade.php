@extends('layouts.app')

@section('content')

<div class="container">
    <div class="cart-page">
        <div class="cart-container">
            <h2 class="cart-title">Корзина</h2>
            <div class="cart-list">
                @forelse($cartItems as $item)
                    <div class="cart-item" data-id="{{$item->id}}">
                        <div class="item-left">
                            <img src="{{ asset('images/products/' . $item->product->image) }}" class="item-image">
                            <div class="item-info">
                                <div class="item-name">
                                    {{ $item->product->title }}
                                </div>
                                <div class="item-price">
                                    {{ $item->product->price }} ₽
                                </div>
                            </div>
                        </div>
                        <div class="item-right">
                            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="quantity">
                                @csrf
                                @method('PUT')
                                <input type="number"
                                       name="quantity"
                                       value="{{ $item->quantity }}"
                                       class="quantity-input">
                                <button class="quantity-btn">✓</button>
                            </form>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="remove-btn">Удалить</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>Корзина пустая</p>
                @endforelse
            </div>
            <div class="cart-bottom">
                <form action="{{ route('orders.store') }}" method="POST" id="orderForm">
                @csrf
                <div id="selectedItemsContainer"></div>
                <div class="cart-footer">
                    <label>
                        Адрес доставки <span style="color:red">*</span>
                    </label>
                    <input type="text" name="address" class="address-input" placeholder="Введите ваш адрес" required>
                    <div class="total">
                        <strong>Итого: {{ $total }} ₽</strong>
                    </div>
                    <button type="submit" class="checkout-btn">
                        Оформить заказ
                    </button>
                </div>
            </form>
            </div>

        </div>
    </div>
</div>
<script>
document.getElementById('orderForm').addEventListener('submit', function (event) {

    const container = document.getElementById('selectedItemsContainer');
    container.innerHTML = '';

    const items = document.querySelectorAll('.cart-item');

    if (items.length === 0) {
        alert('Корзина пуста!');
        event.preventDefault();
        return;
    }

    items.forEach(function (item) {

        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'selected_items[]';
        input.value = item.dataset.id;

        container.appendChild(input);
    });

});
</script>
@endsection