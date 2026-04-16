@extends('layout')

@section('content')
    <h2 class="my-4">Список новостей</h2>
    
    @if($articles->count() > 0)
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        @if($article->preview_image)
                            <img src="{{ asset('images/' . $article->preview_image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-secondary text-white text-center py-5">Нет изображения</div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->short_description }}</p>
                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Читать далее</a>
                        </div>
                        <div class="card-footer text-muted">
                            Создано: {{ $article->created_at->format('d.m.Y') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Пагинация -->
        <div class="d-flex justify-content-center mt-4">
            {{ $articles->links() }}
        </div>
    @else
        <div class="alert alert-info">
            <p>Новостей пока нет.</p>
        </div>
    @endif
@endsection