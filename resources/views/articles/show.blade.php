@extends('layout')

@section('content')
    <div class="my-4">
        <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary mb-3">
            <i class="bi bi-arrow-left"></i> Назад к новостям
        </a>
        
        <div class="card shadow-sm">
            @if($article->full_image)
                <img src="{{ asset('images/' . $article->full_image) }}" class="card-img-top" alt="{{ $article->title }}" style="max-height: 500px; object-fit: cover;">
            @endif
            <div class="card-body">
                <h1 class="card-title">{{ $article->title }}</h1>
                <div class="text-muted mb-4">
                    <i class="bi bi-calendar3"></i> {{ $article->created_at->format('d.m.Y H:i') }}
                </div>
                <div class="card-text" style="font-size: 1.1rem; line-height: 1.8;">
                    {{ $article->content }}
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('articles.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Назад к новостям
                </a>
            </div>
        </div>
    </div>
@endsection