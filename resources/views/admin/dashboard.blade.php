@extends('layouts.app_admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">
                        <i class="bi bi-speedometer2 me-2"></i>
                        Административная панель
                    </h2>
                </div>
                <div class="card-body">
                    <div class="list-group">

                        <a href="/admin/products" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                            <i class="bi bi-box-seam fs-4 text-primary me-3"></i>
                            <div>
                                <div class="fw-bold">Товары</div>
                                <div class="small text-muted">Управление товарами, добавление, редактирование, удаление, SEO-метаданные</div>
                            </div>
                        </a>

                        <a href="/admin/categories" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                            <i class="bi bi-tags fs-4 text-success me-3"></i>
                            <div>
                                <div class="fw-bold">Категории товаров</div>
                                <div class="small text-muted">Управление и SEO-настройки категорий</div>
                            </div>
                        </a>

                        <a href="/admin/orders" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                            <i class="bi bi-receipt fs-4 text-warning me-3"></i>
                            <div>
                                <div class="fw-bold">Заказы</div>
                                <div class="small text-muted">Просмотр и обработка заказов</div>
                            </div>
                        </a>

                        <a href="/admin/stocks" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                            <i class="bi bi-file-earmark-text fs-4 text-info me-3"></i>
                            <div>
                                <div class="fw-bold">Статьи и акции</div>
                                <div class="small text-muted">Добавление, редактирование и SEO-описания</div>
                            </div>
                        </a>

                        <a href="{{ route('admin.reviews.index') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                            <i class="bi bi-chat-dots fs-4 text-secondary me-3"></i>
                            <div>
                                <div class="fw-bold">Отзывы</div>
                                <div class="small text-muted">Модерация и удаление отзывов</div>
                            </div>
                        </a>
                    </div>
                    <hr>
                    <p class="text-center mt-4 small">
                        <i class="bi bi-info-circle-fill text-primary"></i> Для редактирования данных перейдите в соответствующий раздел.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection