@extends('layouts.app_admin')

@section('content')
<div class="container py-5">
    <h1>@isset($product) Редактирование товара "{{ $product->name }}" @else Добавление нового товара @endisset</h1>
    <form action="@isset($product) {{ route('admin.products.update', $product) }} @else {{ route('admin.products.store') }} @endisset" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($product)
            @method('PUT')
        @endisset

        @isset($product)
            <h2>Редактирование товара "{{ $product->name }}"</h2>
            @if ($product->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="" class="img-thumbnail" style="max-width: 200px;">
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" name="delete_image" id="delete_image">
                    <label class="form-check-label" for="delete_image">Удалить текущее изображение</label>
                </div>
                <input type="hidden" name="old_image" value="{{ $product->image }}">
                <hr>
                <label for="image" class="form-label">Новое изображение (оставьте поле пустым, чтобы не менять):</label>
            @else
                <p>Изображение не загружено.</p>
                <label for="image" class="form-label">Загрузить изображение:</label>
            @endif
        @else
            <h2>Добавление нового товара</h2>
            <label for="image" class="form-label">Загрузить изображение:</label>
        @endisset

        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
        <p class='text-muted'>Рекомендуемый размер и формат .jpg / .png. Макс. размер файла: 2Мб.</p>
        @error('image')
            <div class='invalid-feedback d-block'>{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="title" class="form-label">Название товара</label>
            <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror form-control" value="{{ old('title', isset($product) ? $product->title : '') }}" required>
            @error('title')
                <div class='invalid-feedback'>{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input type="number" name="price" id="price" step="0.01" min="0" class="@error('price') is-invalid @enderror form-control" value="{{ old('price', isset($product) ? $product->price : '') }}" required>
            @error('price')
                <div class='invalid-feedback'>{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Категория</label>
            <select name="category_id" id="category_id" class="@error('category_id') is-invalid @enderror form-select" required>
                <option value="">Выберите категорию</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ (old('category_id', isset($product) ? $product->category_id : '') == $cat->id) ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class='invalid-feedback'>{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea name="description" id="description" rows="4" class="@error('description') is-invalid @enderror form-control">{{ old('description', isset($product) ? $product->description : '') }}</textarea>
            @error('description')
                <div class='invalid-feedback'>{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pet" class="form-label">Животное</label>
            <select name="pet" id="pet" class="@error('pet') is-invalid @enderror form-select" required>
                <option value="">Выберите животное</option>
                <option value="cat" {{ (old('pet', isset($product) ? $product->pet : '') == 'cat') ? 'selected' : '' }}>Кошка</option>
                <option value="dog" {{ (old('pet', isset($product) ? $product->pet : '') == 'dog') ? 'selected' : '' }}>Собака</option>
                <option value="bird" {{ (old('pet', isset($product) ? $product->pet : '') == 'bird') ? 'selected' : '' }}>Птица</option>
            </select>
            @error('pet')
                <div class='invalid-feedback'>{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="shortDescription" class="form-label">Короткое описание</label>
            <textarea name="shortDescription" id="shortDescription" rows="2" class="@error('shortDescription') is-invalid @enderror form-control">{{ old('shortDescription', isset($product) ? $product->shortDescription : '') }}</textarea>
            @error('shortDescription')
                <div class='invalid-feedback'>{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="structure" class="form-label">Состав / Структура</label>
            <textarea name="structure" id="structure" rows="3" class="@error('structure') is-invalid @enderror form-control">{{ old('structure', isset($product) ? $product->structure : '') }}</textarea>
            @error('structure')
                <div class='invalid-feedback'>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            @isset($product) Сохранить изменения @else Добавить товар @endisset
        </button>
    </form>
</div>
@endsection