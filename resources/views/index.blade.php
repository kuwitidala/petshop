@extends('layouts.app')

@section('content')
<section class="banner">
    <div class="slider">
        <div class="slides">
            <div class="slide slide-one">
                <div class="slide-inner">
                    <div class="slide-text slide-one">
                        <h2>КОМФОРТНЫЙ СОН ДЛЯ ВАШЕГО КОТА</h2>
                        <p>
                            Обеспечьте своему коту уют и спокойствие с нашими мягкими лежаками и уголками.
                            Пусть отдых будет идеальным!
                        </p>
                        <button class="slide-button slide-one"  onclick="window.location='{{ url('/catalog')}}'">Каталог</button>
                    </div>

                    <div class="slide-image right-offset">
                        <img src="{{ asset('images/slide1.jpg') }}" alt="">
                    </div>

                </div>
            </div>
            <div class="slide slide-two">
                <div class="slide-inner">
                    <div class="slide-image">
                        <img src="{{ asset('images/slide2.jpg') }}" alt="">
                    </div>
                    <div class="slide-text right-text  slide-two">
                        <h2>БЛЕСТЯЩАЯ И ЗДОРОВАЯ ШЕРСТЬ</h2>
                        <p>
                            Ухаживайте за шерстью вашего питомца с нашими шампунями и расческами.
                            Пусть шерсть сияет!
                        </p>
                        <button class="slide-button slide-two" onclick="window.location.href='/catalog'">Каталог</button>
                    </div>

                </div>
            </div>
            <div class="slide slide-three">
                <div class="slide-inner">
                    <div class="slide-text slide-three">
                        <h2>АКТИВНАЯ ЖИЗНЬ ДЛЯ ВАШЕГО ЛЮБИМЦА</h2>
                        <p>
                            Игрушки, прогулки и веселье – залог здоровья и счастья собаки.
                            Сделайте каждый день ярким!
                        </p>
                        <button class="slide-button slide-three" onclick="window.location.href='/catalog'">Каталог</button>
                    </div>

                    <div class="slide-image right-offset">
                        <img src="{{ asset('images/slide3.webp') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <button class="btn-slider prev">&#10094;</button>
        <button class="btn-slider next">&#10095;</button>
    </div>
</section>

<section class="products">
    <div class="container">
        <h2 class="h2-about">Новинки</h2>

        <div class="product-grid" id="product-grid">
        </div>

        <button class="btn-load" id="btn-load">Показать ещё</button>
    </div>
</section>

<section class="about">
    <div class="container about-content">

        <div class="about-text">
            <h2 class="h2-about">О нас</h2>

            <p>
                Всё началось с простой идеи: наши питомцы — члены семьи, 
                и они заслуживают питания, которым мы могли бы гордиться.
            </p>

            <p>
                Основав компанию в 2026, мы поставили перед собой цель — 
                создавать корма, которые будут не просто кормить, 
                а дарить здоровье и радость каждому животному.
            </p>

            <p class="h2-about"><strong>За годы работы мы:</strong></p>
            <ul>
                <li>изучили потребности кошек и собак всех возрастов и пород;</li>
                <li>наладили сотрудничество с поставщиками натурального сырья;</li>
                <li>внедрили строгие стандарты контроля качества;</li>
                <li>расширили ассортимент продукции.</li>
            </ul>

            <p>
                Сегодня наш корм — это сочетание любви, науки и технологий.
                Мы гордимся тем, что помогаем питомцам быть здоровыми и счастливыми.
            </p>
        </div>

        <div class="about-image">
            <img src="{{ asset('images/about.png') }}" alt="about">
        </div>

    </div>
</section>

<section class="products">
    <div class="container">
        <h2 class="h2-about">Акции</h2>

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
        <div class="text-center mt-4">
            <a href="{{ url('stocks') }}" class="btn-more-stock">
                Смотреть больше →
            </a>
        </div>
    </div>
</section>

<section class="faq">
    <div class="container">
        <h2 class="h2-about">Часто задаваемые вопросы</h2>
        @forelse($faqs as $faq)
            <div class="faq-item">
                <h4>{{ $faq->question }}</h4>
                <p>{{ $faq->answer }}</p>
            </div>
        @empty
            <div class="faq-item">
                <h4>Вопрос?</h4>
                <p>Ответ на вопрос</p>
            </div>
        @endforelse
    </div>
    <div class="text-center mt-4">
        <a href="{{ url('FAQ') }}" class="btn-more-stock">
            Смотреть больше →
        </a>
    </div>
</section>
<script>
    const csrfToken = '{{ csrf_token() }}';
</script>
<script>
    const isAuth = {{ auth()->check() ? 'true' : 'false' }};
</script>
    <script src="{{ asset('js/load.js') }}"></script>
@endsection
