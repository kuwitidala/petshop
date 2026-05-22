@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

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

                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                            <i class="bi bi-box-seam fs-4 text-primary me-3"></i>
                            <div>
                                <div class="fw-bold">Товары</div>
                                <div class="small text-muted">
                                    Управление товарами, добавление, редактирование, удаление, SEO-метаданные
                                </div>
                            </div>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                            <i class="bi bi-tags fs-4 text-success me-3"></i>
                            <div>
                                <div class="fw-bold">Категории товаров</div>
                                <div class="small text-muted">
                                    Управление и SEO-настройки категорий
                                </div>
                            </div>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                            <i class="bi bi-receipt fs-4 text-warning me-3"></i>
                            <div>
                                <div class="fw-bold">Заказы</div>
                                <div class="small text-muted">
                                    Просмотр и обработка заказов
                                </div>
                            </div>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                            <i class="bi bi-file-earmark-text fs-4 text-info me-3"></i>
                            <div>
                                <div class="fw-bold">Статьи и акции</div>
                                <div class="small text-muted">
                                    Добавление, редактирование и SEO-описания
                                </div>
                            </div>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                            <i class="bi bi-chat-dots fs-4 text-secondary me-3"></i>
                            <div>
                                <div class="fw-bold">Отзывы</div>
                                <div class="small text-muted">
                                    Модерация и удаление отзывов
                                </div>
                            </div>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                            <i class="bi bi-person-gear fs-4 text-danger me-3"></i>
                            <div>
                                <div class="fw-bold">Контактная информация</div>
                                <div class="small text-muted">
                                    Настройка, в том числе номера для кнопки «Позвонить»
                                </div>
                            </div>
                        </a>
                        
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                            <i class="bi bi-graph-up fs-4 text-dark me-3"></i>
                            <div>
                                <div class="fw-bold">Статистика</div>
                                <div class="small text-muted">
                                    Просмотр статистики продаж и активности пользователей
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="mt-4 text-end">
                        <a href="/" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> На главную
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection