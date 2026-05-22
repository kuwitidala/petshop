<footer class="footer">
    <div class="container footer-content">

        <div class="footer-col">
            <div class="logo">treats for pets</div>
        </div>

        <div class="footer-col">
            <a href="{{ url('/about') }}">О нас</a>
            <a href="#">Каталог</a>
            <a href="#">Контакты</a>
            <a href="#">Корзина</a>
        </div>

        <div class="footer-col">
            <a href="{{ route('articles') }}">Полезные статьи</a>
            <a href="#">Отзывы</a>
            <a href="#">FAQ</a>
            <a href="#">Вход</a>
        </div>

        <div class="footer-col">
            <p>г. Москва, ул. Пушкинская, 1</p>
            <button class="btn-call">Позвонить</button>
        </div>

    </div>
</footer>
    <script src="{{ asset('js/script.js') }}"></script>
</div>