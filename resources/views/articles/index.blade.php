@extends('layout')

@section('content')
    <h2 class="my-4"><i class="bi bi-newspaper"></i> Новости</h2>
    
    @if($articles->count() > 0)
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($article->preview_image)
                            <img src="{{ asset('images/' . $article->preview_image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-secondary text-white text-center py-5">
                                <i class="bi bi-image" style="font-size: 48px;"></i>
                                <br>Нет изображения
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($article->short_description, 100) }}</p>
                            <div class="mt-auto">
                                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">
                                    <i class="bi bi-eye"></i> Читать далее
                                </a>
                            </div>
                        </div>
                        <div class="card-footer text-muted small">
                            <i class="bi bi-calendar3"></i> {{ $article->created_at->format('d.m.Y') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="d-flex justify-content-center mt-4">
            {{ $articles->links() }}
        </div>
    @else
        <div class="alert alert-info text-center">
            <i class="bi bi-info-circle"></i> Новостей пока нет.
        </div>
    @endif
@endsection