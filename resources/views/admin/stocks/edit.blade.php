@extends('layouts.app_admin')

@section('content')
<div class="container py-5">
    <h1>@isset($stock) Редактирование товара "{{ $stock->name }}" @else Добавление нового товара @endisset</h1>
    <form action="{{ route('admin.stocks.update', $stock) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if ($stock->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $stock->image) }}" alt="" class="img-thumbnail" style="max-width: 200px;">
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" name="delete_image" id="delete_image">
                <label class="form-check-label" for="delete_image">Удалить текущее изображение</label>
            </div>
            <input type="hidden" name="old_image" value="{{ $stock->image }}">
            <hr>
            <label for="image" class="form-label">Новое изображение (оставьте поле пустым, чтобы не менять):</label>
        @else
            <p>Изображение не загружено.</p>
            <label for="image" class="form-label">Загрузить изображение:</label>
        @endif

        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
        <p class='text-muted'>Рекомендуемый размер и формат .jpg / .png. Макс. размер файла: 2Мб.</p>
        @error('image')
            <div class='invalid-feedback d-block'>{{ $message }}</div>
        @enderror

        <!-- Название товара -->
        <!-- Название товара (теперь title) -->
        <div class="mb-3">
            <label for="title" class="form-label">Название товара</label>
            <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror form-control" value="{{ old('title', $stock->title ?? '') }}" required>
            @error('title')
                <div class='invalid-feedback'>{{ $message }}</div>
            @enderror
        </div>


        <!-- Описание -->
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea name="description" id="description" rows="4" class="@error('description') is-invalid @enderror form-control">{{ old('description', $stock->description) }}</textarea>
            @error('description')
                <div class='invalid-feedback'>{{ $message }}</div>
            @enderror
        </div>

       

        <!-- Кнопка -->
        <button type="submit" class="btn btn-primary mt-3">
            @isset($stock) Сохранить изменения @else Добавить товар @endisset
        </button>
    </form>
</div>
@endsection