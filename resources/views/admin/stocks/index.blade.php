@extends('layouts.app_admin')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Товары</h1>
        <a href="{{ route('admin.stocks.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Добавить товар
        </a>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Изображение</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($stocks as $stock)
                    <tr>
                        <td>{{ $stock->id }}</td>
                        <td>{{ $stock->title }}</td>
                        <td>{{ $stock->description }}</td>
                        <td>
                            @if ($stock->image)
                                <img src="{{ asset('/images/stocks/' . $stock->image) }}" alt="" width="60">
                            @else
                                Нет фото
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.stocks.edit', $stock) }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.stocks.destroy', $stock) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center">Товаров нет</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection