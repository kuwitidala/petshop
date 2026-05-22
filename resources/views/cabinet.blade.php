@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="cabinet-wrapper">
        <div class="cabinet-sidebar">
            <h3>Личный кабинет</h3>
            <a href="/cart">Корзина</a>
            <a href="/orders">Заказы</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Выход</button>
            </form>
        </div>
        <div class="cabinet-content">
            <h2 class="h2-about">Ваши данные</h2>
            
            <div class="info-box">
                Добро пожаловать в ваш личный кабинет 🐾
            </div><br>

            <div class="user-card">
                <strong>Имя:</strong> {{ auth()->user()->name }}
            </div>

            <div class="user-card">
                <strong>Email:</strong> {{ auth()->user()->email }}
            </div>
        </div>

    </div>

</div>

@endsection