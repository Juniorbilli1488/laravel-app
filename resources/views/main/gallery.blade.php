@extends('layout')
@section('content')
    @if(!empty($article))
        <h2 class="my-4">{{ $article['title'] ?? 'Без заголовка' }}</h2>
        <div class="card">
            @if(!empty($article['full_image']))
                <img src="{{ asset('images/' . $article['full_image']) }}" class="card-img-top" alt="{{ $article['title'] }}">
            @else
                <div class="bg-secondary text-white text-center py-5">Нет изображения</div>
            @endif
            <div class="card-body">
                <p class="card-text">{{ $article['content'] ?? 'Полное описание статьи...' }}</p>
                <a href="/" class="btn btn-secondary">← Назад к новостям</a>
            </div>
        </div>
    @else
        <div class="alert alert-danger">
            <p>Статья не найдена.</p>
            <a href="/" class="btn btn-secondary">← Назад к новостям</a>
        </div>
    @endif
@endsection