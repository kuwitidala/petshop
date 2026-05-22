@extends('layouts.app')

@section('content')

<div class="container ">
    <h1 class="text-center mb-4">Отзывы о товарах</h1>
    <div class="card mb-4">
        <div class="card-header bg-success text-white">Оставить отзыв</div>
        <div class="card-body">
            <form id="reviewForm">
                <div class="mb-3">
                    <input type="text" class="form-control" id="product" placeholder="Наименование товара" required>
                </div>
                <div class="mb-3">
                    <select class="form-select" id="rating" required>
                        <option value="" disabled selected>Выберите рейтинг</option>
                        <option value="5">5 - Отлично</option>
                        <option value="4">4 - Хорошо</option>
                        <option value="3">3 - Нормально</option>
                        <option value="2">2 - Плохо</option>
                        <option value="1">1 - Очень плохо</option>
                    </select>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="comment" rows="4" placeholder="Ваш отзыв..." required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Отправить отзыв</button>
            </form>
        </div>
    </div>

    <h2 class="h2-about">Все отзывы</h2>
    <div id="reviewsContainer"></div>
</div>

<script>
  const reviewsContainer = document.getElementById('reviewsContainer');
  const form = document.getElementById('reviewForm');

  form.addEventListener('submit', function(e) {
    e.preventDefault();
    const product = document.getElementById('product').value;
    const rating = document.getElementById('rating').value;
    const comment = document.getElementById('comment').value;

    const reviewDiv = document.createElement('div');
    reviewDiv.className = 'card mb-3';
    reviewDiv.innerHTML = `
      <div class="card-header bg-success text-white"> ${product} - Рейтинг: ${rating} </div>
      <div class="card-body">
        <p class="card-text">${comment}</p>
      </div>
    `;
    reviewsContainer.appendChild(reviewDiv);
    form.reset();
  });
</script>
@endsection