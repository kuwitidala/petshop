<div class="wrapper">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <header class="header">
        <div class="container header-top">
            <a class="logo-link" href="{{ url('/') }}"><div class="logo">treats for pets</div></a>
            <nav class="nav">
                <a href="{{ url('/about') }}">О нас</a>
                <a href="{{ url('/catalog')}}">Каталог</a>
                <a href="{{ auth()->check() ? url('/cart') : route('login') }}">Корзина</a>
                <a href="{{ auth()->check() ? url('/cabinet') : route('login') }}">{{ auth()->check() ? auth()->user()->name : 'Вход' }}</a> 
            </nav>
        </div>

        <div class="subnav">
            <div class="container">
                <a href="{{ route('articles') }}">Полезные статьи</a>
                <a href="{{ url('stocks') }}">Акции</a>
                <a href="{{ url('contact') }}">Контакты</a>
                <a href="{{ url('FAQ') }}">FAQ</a>
            </div>
        </div>
    </header>