@extends('layout')

@section('content')
    <h2 class="my-4">Создание новой статьи</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Заголовок <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            <small class="text-muted">Минимум 3 символа</small>
        </div>

        <div class="mb-3">
            <label for="short_description" class="form-label">Краткое описание <span class="text-danger">*</span></label>
            <textarea name="short_description" id="short_description" class="form-control" rows="3" required>{{ old('short_description') }}</textarea>
            <small class="text-muted">Минимум 10 символов</small>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Полное содержание <span class="text-danger">*</span></label>
            <textarea name="content" id="content" class="form-control" rows="8" required>{{ old('content') }}</textarea>
            <small class="text-muted">Минимум 20 символов</small>
        </div>

        <div class="mb-3">
            <label for="preview_image" class="form-label">Изображение-превью</label>
            <input type="text" name="preview_image" id="preview_image" class="form-control" placeholder="preview.jpg" value="{{ old('preview_image') }}">
            <small class="text-muted">Имя файла из папки public/images/</small>
        </div>

        <div class="mb-3">
            <label for="full_image" class="form-label">Полное изображение</label>
            <input type="text" name="full_image" id="full_image" class="form-control" placeholder="full.jpeg" value="{{ old('full_image') }}">
            <small class="text-muted">Имя файла из папки public/images/</small>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a href="{{ route('articles.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection