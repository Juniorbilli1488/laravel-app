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
    <!-- Комментарии -->
<div class="mt-5">
    <h4><i class="bi bi-chat-dots"></i> Комментарии</h4>
    <hr>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($article->approvedComments()->count() > 0)
        @foreach($article->approvedComments as $comment)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <strong><i class="bi bi-person-circle"></i> {{ $comment->user->name }}</strong>
                        <small class="text-muted">{{ $comment->created_at->format('d.m.Y H:i') }}</small>
                    </div>
                    <p class="mt-2">{{ $comment->content }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p class="text-muted">Комментариев пока нет. Будьте первым!</p>
    @endif

    @auth
        <div class="card mt-4">
            <div class="card-body">
                <h5>Добавить комментарий</h5>
                <form action="{{ route('comments.store', $article->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" 
                                  rows="3" placeholder="Ваш комментарий..." required></textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить комментарий</button>
                </form>
            </div>
        </div>
    @else
        <div class="alert alert-info mt-3">
            <a href="{{ route('login') }}">Войдите</a> или <a href="{{ route('register') }}">зарегистрируйтесь</a>, чтобы оставить комментарий.
        </div>
    @endauth
</div>
@endsection