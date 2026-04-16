@extends('layout')

@section('content')
    <h2>Создание статьи</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.articles.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Заголовок</label><input type="text" name="title" class="form-control" required></div>
        <div class="mb-3"><label>Краткое описание</label><textarea name="short_description" class="form-control" rows="3" required></textarea></div>
        <div class="mb-3"><label>Полное содержание</label><textarea name="content" class="form-control" rows="5" required></textarea></div>
        <div class="mb-3"><label>Превью изображение</label><input type="text" name="preview_image" class="form-control"></div>
        <div class="mb-3"><label>Полное изображение</label><input type="text" name="full_image" class="form-control"></div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection