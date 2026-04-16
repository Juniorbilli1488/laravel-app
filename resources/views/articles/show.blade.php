@extends('layout')

@section('content')
    <h2 class="my-4">{{ $article->title }}</h2>
    
    <div class="card">
        @if($article->full_image)
            <img src="{{ asset('images/' . $article->full_image) }}" class="card-img-top" alt="{{ $article->title }}">
        @endif
        <div class="card-body">
            <p class="card-text">{{ $article->content }}</p>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">← Назад к новостям</a>
        </div>
        <div class="card-footer text-muted">
            Создано: {{ $article->created_at->format('d.m.Y') }}
        </div>
    </div>
@endsection