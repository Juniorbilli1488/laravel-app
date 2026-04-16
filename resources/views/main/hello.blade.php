@extends('layout')
@section('content')
    <h2 class="my-4">Новости</h2>    
    @if(!empty($articles) && count($articles) > 0)
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        @if(!empty($article['preview_image']))
                            <img src="{{ asset('images/' . $article['preview_image']) }}" class="card-img-top" alt="{{ $article['title'] }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-secondary text-white text-center py-5">Нет изображения</div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $article['title'] ?? 'Без заголовка' }}</h5>
                            <p class="card-text">{{ $article['short_description'] ?? 'Нет описания' }}</p>
                            <a href="{{ route('gallery', $article['id']) }}" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            <p>Новостей пока нет. Пожалуйста, проверьте файл articles.json.</p>
        </div>
    @endif
@endsection