@extends('layout')

@section('content')
    <h2>Редактирование статьи</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3"><label>Заголовок</label><input type="text" name="title" class="form-control" value="{{ old('title', $article->title) }}" required></div>
        <div class="mb-3"><label>Краткое описание</label><textarea name="short_description" class="form-control" rows="3" required>{{ old('short_description', $article->short_description) }}</textarea></div>
        <div class="mb-3"><label>Полное содержание</label><textarea name="content" class="form-control" rows="5" required>{{ old('content', $article->content) }}</textarea></div>
        <div class="mb-3"><label>Превью изображение</label><input type="text" name="preview_image" class="form-control" value="{{ old('preview_image', $article->preview_image) }}"></div>
        <div class="mb-3"><label>Полное изображение</label><input type="text" name="full_image" class="form-control" value="{{ old('full_image', $article->full_image) }}"></div>
        <button type="submit" class="btn btn-primary">Обновить</button>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection