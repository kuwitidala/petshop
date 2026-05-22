@extends('layouts.app')

@section('content')

<div class="product-page">

    <div class="product-header">

      <img src="{{ asset('images/products/' . $product->image) }}"
           class="product-image"
           alt="{{ $product->title }}">

      <div class="product-info">
          <div class="product-title">
              {{ $product->title }}
          </div>
          <div class="product-price">
              {{ $product->price }} ₽
          </div>
          <div class="product-text">
              {{ $product->description }}
          </div>
          <div class="product-composition">
              <strong>Состав:</strong><br>
              {{ $product->structure }}
          </div>

          @if(auth()->check())
              <form action="{{ route('cart.add', $product->id) }}" method="POST" style="margin-top:25px;">
                  @csrf
                  <button type="submit" class="btn-add-product" onclick="alert('Товар добавлен в корзину')">
                      Купить
                  </button>
              </form>
          @else
              <button type="button" class="btn-add-product" style="margin-top:25px;"
                      onclick="alert('Чтобы добавить товар в корзину, войдите в профиль')">
                  Купить
              </button>
          @endif

      </div>

   </div>


   @if(auth()->check())
       <div class="mt-5 p-4 bg-light rounded" style="border-radius:12px; box-shadow: 0 2px 6px rgba(0,0,0,0.05);">
           <h3>Оставить отзыв</h3>
           <form action="{{ route('reviews.store', $product->id) }}" method="POST">
               @csrf

               <div class="mb-3">
                   <label for="rating" class="form-label">Ваша оценка:</label>
                   <select name="rating" id="rating" class="form-select" required>
                       <option value="">Выберите звездочки...</option>
                       <option value="5">★★★★★ (Отлично)</option>
                       <option value="4">★★★★☆ (Хорошо)</option>
                       <option value="3">★★★☆☆ (Нормально)</option>
                       <option value="2">★★☆☆☆ (Плохо)</option>
                       <option value="1">★☆☆☆☆ (Ужасно)</option>
                   </select>
               </div>

               <div class="mb-3">
                   <label for="reviewText" class="form-label">Текст отзыва</label>
                   <textarea name="text" id="reviewText" rows="4" class="form-control"
                             placeholder="Расскажите о своем опыте..." required></textarea>
               </div>

               <button type="submit" class="btn btn-primary-custom w-100">
                   Отправить отзыв
               </button>
           </form>
       </div>
   @else
       <p class="mt-4 text-muted">
           <i class="bi bi-lock-fill"></i> Чтобы оставить отзыв, пожалуйста, <a href="{{ route('login') }}">войдите в аккаунт</a>.
       </p>
   @endif

   <hr class="my-5">
   <section class="reviews-section">
       <h2 class="reviews-title">Отзывы покупателей ({{ $product->reviews()->where('is_approved', true)->count() }})</h2>

       @if($product->reviews()->where('is_approved', true)->count() > 0)
           @foreach($product->reviews()->where('is_approved', true)->latest()->get() as $review)
               <div class="review-card">
                   <div class="review-header">
                       <span class="review-author">{{ $review->user->name }}</span>
                       <span class="review-date text-muted">{{ $review->created_at->format('d.m.Y') }}</span>
                   </div>
                   <p class="review-rating">
                       @for ($i = 1; $i <= 5; $i++)
                           <span class="@if($i <= $review->rating) text-warning @else text-muted @endif">★</span>
                       @endfor
                   </p>
                   <p class="review-text">{{ nl2br($review->text) }}</p> 
               </div>
           @endforeach
       @else
           <p>У этого товара пока нет отзывов. Будьте первым!</p>
       @endif

   </section>

</div>

@endsection