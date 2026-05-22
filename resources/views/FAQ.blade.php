@extends('layouts.app')

@section('content')

<div class="container">
    <section class="faq">
    <div class="container">
        <h2 class="h2-about">Часто задаваемые вопросы</h2>
        @forelse($faqs as $faq)
            <div class="faq-item-detail">
                <h4>{{ $faq->question }}</h4>
                <p>{{ $faq->answer }}</p>
            </div>
        @empty
            <div class="faq-item">
                <h4>Вопрос?</h4>
                <p>Ответ на вопрос</p>
            </div>
        @endforelse
    </div>
    
</section>
</div>
@endsection