@extends('layouts.app')

@section('content')

<section class="auth-page">

    <div class="container auth-container">

        <div class="auth-box">

            <h1>Вход</h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf 
                <label>Email</label>
                <input type="email" name="email" placeholder="Введите email" value="{{ old('email') }}">
                @error('email')<div style="color:red;">{{ $message }}</div>@enderror

                <label>Пароль</label>
                <input type="password" name="password" placeholder="Введите пароль">
                @error('password')<div style="color:red;">{{ $message }}</div>@enderror

                <button type="submit">Войти</button>
            </form>

            <p class="auth-link">
                Нет аккаунта?
                <a href="{{ route('register') }}">Зарегистрироваться</a>
            </p>

        </div>

    </div>

</section>

@endsection