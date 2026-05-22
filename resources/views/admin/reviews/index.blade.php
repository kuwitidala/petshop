@extends('layouts.app_admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Управление отзывами</h1>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Пользователь</th>
                    <th>Товар</th>
                    <th>Оценка</th>
                    <th>Статус</th>
                    <th>Дата</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->user->name ?? 'Удален' }}</td>
                    <td>{{ $review->product->title ?? 'Товар удален' }}</td>
                    <td>
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="text-{{ $i <= $review->rating ? 'warning' : 'muted' }}">
                                ★
                            </span>
                        @endfor
                    </td>
                    <td>
                        <span class="badge bg-{{ $review->is_approved ? 'success' : 'danger' }}">
                            {{ $review->is_approved ? 'Одобрен' : 'На проверке' }}
                        </span>
                    </td>
                    <td>{{ $review->created_at->format('d.m.Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.reviews.show', $review->id) }}" class="btn btn-sm btn-info">Посмотреть</a>
                        @if(!$review->is_approved)
                            <form action="{{ route('admin.reviews.approve', $review->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit">Одобрить</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Отзывы пока нет.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection