@extends('layouts.app')

@section('content')

<section class="auth-page">
    <div class="container auth-container">
        <div class="auth-box">
            <h1>Регистрация</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <label for="name">Имя</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Введите имя">
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Введите email">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" placeholder="Введите пароль">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="password_confirmation">Повтор пароля</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Повторите пароль">

                <button type="submit">Создать аккаунт</button>
            </form>

            <p class="auth-link">
                Уже есть аккаунт?
                <a href="{{ route('login') }}">Войти</a>
            </p>
        </div>
    </div>
</section>

@endsection