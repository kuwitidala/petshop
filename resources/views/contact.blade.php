@extends('layouts.app')

@section('content')

<div class="container ">
  <div class="contact-container">
    <h1 class="text-center mb-4">Контактная информация</h1>
    <ul class="list-group mb-4">
      <li class="list-group-item"><strong>Адрес:</strong> г. Москва, ул. Пушкина, д. 10</li>
      <li class="list-group-item"><strong>Телефон:</strong> +7 (495) 123-45-67</li>
      <li class="list-group-item"><strong>Почта:</strong> info@vetshop.ru</li>
      <li class="list-group-item"><strong>Время работы:</strong> 9:00-17:00 (пн-пт)</li>
    </ul>
    <p class="text-center">
      <a class="map-link" href="https://yandex.ru/maps/?ll=37.6173,55.7558&z=14" target="_blank">Посмотреть на Яндекс.Картах</a>
    </p>
    <div id="map"></div>
  </div>
</div>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script>
  ymaps.ready(function () {
    var map = new ymaps.Map("map", {
      center: [55.7558, 37.6173], 
      zoom: 14
    });
    var placemark = new ymaps.Placemark([55.7558, 37.6173], {
      hintContent: 'Наш офис',
      balloonContent: 'г. Москва, ул. Пушкина, д. 10'
    });
    map.geoObjects.add(placemark);
  });
</script>
@endsection