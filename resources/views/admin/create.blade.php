@extends('layout')

@section('content')
    <div class="my-4">
        <h2><i class="bi bi-plus-circle"></i> Создание новой статьи</h2>
        <hr>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-triangle"></i> Пожалуйста, исправьте следующие ошибки:
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('articles.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Заголовок <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Введите заголовок статьи" required>
                    <small class="text-muted">Минимум 3 символа</small>
                </div>

                <div class="mb-3">
                    <label for="short_description" class="form-label fw-bold">Краткое описание <span class="text-danger">*</span></label>
                    <textarea name="short_description" id="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="3" placeholder="Введите краткое описание" required>{{ old('short_description') }}</textarea>
                    <small class="text-muted">Минимум 10 символов</small>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label fw-bold">Полное содержание <span class="text-danger">*</span></label>
                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="10" placeholder="Введите полный текст статьи" required>{{ old('content') }}</textarea>
                    <small class="text-muted">Минимум 20 символов</small>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="preview_image" class="form-label fw-bold">Изображение-превью</label>
                            <input type="text" name="preview_image" id="preview_image" class="form-control" placeholder="preview.jpg" value="{{ old('preview_image') }}">
                            <small class="text-muted">Имя файла из папки public/images/</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="full_image" class="form-label fw-bold">Полное изображение</label>
                            <input type="text" name="full_image" id="full_image" class="form-control" placeholder="full.jpeg" value="{{ old('full_image') }}">
                            <small class="text-muted">Имя файла из папки public/images/</small>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('articles.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Отмена
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Сохранить статью
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection