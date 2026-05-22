@extends('layouts.app')

@section('content')
<div class="container mb-5">
  <div class="search-bar mb-4">
    <form action="{{ route('catalog.index') }}" method="GET" class="row justify-content-center align-items-center">
      <div class="col-md-8 d-flex">
        <input type="text" name="search" class="form-control" placeholder="Поиск по товарам..." />
        <button type="submit" class="btn btn-primary-custom ms-2">Найти</button>
      </div>
    </form>
  </div>

  <div class="row">
    <div class="col-md-3 mb-4">
      <div class="filter-section p-3 bg-white rounded shadow-sm">
        <h4>Фильтр</h4>
        
        <form action="{{ route('catalog.index') }}" method="GET">
          
          <div class="mb-3">
            <label class="form-label">Тип товара</label>
            <select name="category_id" class="form-select">
              <option value="">Все</option>
              <option value="5">Корм</option>
              <option value="6">Игрушка</option>
              <option value="7">Уход</option>
              <option value="8">Аксессуар</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Для животных</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="for_dogs" value="1" />
              <label class="form-check-label">Собаки</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="for_cats" value="1" />
              <label class="form-check-label">Кошки</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="for_birds" value="1" />
              <label class="form-check-label">Птицы</label>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Цена</label>
            <input type="range" name="max_price" class="form-range" min="100" max="55000" />
            <div class="mt-2">Максимальная цена: <span id="price-value">55000</span> руб.</div>
          </div>
          
          <button type="submit" class="btn btn-primary-custom filter-search-btn w-100">Поиск по фильтру</button>
          <a href="{{ route('catalog.index') }}" class="link-reset mt-5">Сбросить фильтры</a>
          
        </form>
      </div>
    </div>

   <div class="col-md-9">
      <div class="product-grid">
            @forelse($products as $product)
                <div class="product-card">
                    <div class="card-content"
                        onclick="window.location='{{ route('product.show', $product->id) }}'">
                        <div class="product-image">
                            <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}">
                        </div>
                        <span class="price">{{ $product->price }}</span>
                        <p class="card-title" >{{ $product->title }}</p>
                        <p class="card-desc">{{ $product->shortDescription }}</p>
                    </div>
                    @if(auth()->check())
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="cart-button" onclick="alert('Товар добавлен в корзину')">
                                Купить
                            </button>
                        </form>
                    @else
                        <button type="button" class="cart-button"
                                onclick="alert('Чтобы добавить товар в корзину, войдите в профиль')">
                            Купить
                        </button>
                    @endif
                </div>
            @empty
                <p>Товаров нет в этой категории.</p>
            @endforelse
        </div>
    </div>
</div>


@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const rangeSlider = document.querySelector('input[name="max_price"]');
    const priceValue = document.getElementById('price-value');
    
    if (rangeSlider && priceValue) {
        priceValue.textContent = rangeSlider.value;
        
        rangeSlider.addEventListener('input', function() {
            priceValue.textContent = this.value;
        });
    }
});
</script>
@endpush
