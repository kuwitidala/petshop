@extends('layouts.app')

@section('content')

<h1 class="text-center">Полезные советы: как выбрать лучший корм для вашего питомца</h1>

<div class="container">
  <div class="card mb-4 shadow-sm border-0 rounded-3">
    <div class="card-body-article">
      <h2 class="h3 text-success mb-3">Что важно знать о корме для домашних животных</h2>
      <p class="mb-3">Питание — это фундамент здоровья вашего любимца. От правильного выбора корма зависит его энергия, иммунитет и долголетие. Сегодня на рынке представлено огромное разнообразие кормов: сухие, влажные, натуральные и специальные диеты, разработанные для особых нужд. Важно ориентироваться на качество ингредиентов и состав, чтобы обеспечить питомцу полноценное питание.</p>
      <p>Обратите внимание на наличие в составе витаминов, минералов и натуральных компонентов. Избегайте кормов с большим количеством искусственных добавок и консервантов. Консультация с ветеринаром поможет подобрать оптимальный рацион, учитывающий возраст, породу и особенности здоровья вашего питомца.</p>
    </div>
  </div>

  <div class="card mb-4 shadow-sm border-0 rounded-3">
    <div class="card-body-article">
        <h2 class="h3 text-success mb-3">Полезные статьи</h2>

        <ul class="list-group list-group-flush">
            @foreach($articles as $article)
                <li class="list-group-item bg-transparent px-0 py-2">
                    <a href="{{ route('articles.show', $article->id) }}"
                       class="text-decoration-none text-success fw-semibold">
                        {{ $article->title }}
                    </a>
                </li>
            @endforeach
        </ul>

    </div>
</div>
  </div>

  <div class="card mb-4 shadow-sm border-0 rounded-3">
    <div class="card-body p-4 text-center">
      <h2 class="h3 text-success mb-3">Совет дня</h2>
      <div class="interactive-box mx-auto" id="adviceBox" style="max-width: 600px;">
        <h3 class="mb-3">Кликните, чтобы узнать совет!</h3>
        <div class="advice-text" id="adviceText">Выбирайте корм, соответствующий возрасту и породе вашего питомца, чтобы обеспечить ему полноценное питание и здоровье.</div>
      </div>
    </div>
  </div>
</div>

<script>
  const advice = [
    "Выбирайте корм, соответствующий возрасту и породе вашего питомца, чтобы обеспечить ему полноценное питание и здоровье.",
    "Обратите внимание на состав: чем больше натуральных ингредиентов, тем лучше питание для вашего питомца.",
    "Регулярно меняйте корм и следите за реакцией питомца, чтобы подобрать наиболее подходящий вариант.",
    "Не забывайте консультироваться с ветеринаром при выборе нового типа корма.",
    "Добавляйте в рацион питомца свежие овощи и фрукты для разнообразия и дополнительной пользы."
  ];

  const adviceText = document.getElementById('adviceText');
  const adviceBox = document.getElementById('adviceBox');

  let currentIndex = 0;

  adviceBox.addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % advice.length;
    adviceText.style.opacity = 0;
    setTimeout(() => {
      adviceText.textContent = advice[currentIndex];
      adviceText.style.opacity = 1;
    }, 300);
  });
</script>

@endsection