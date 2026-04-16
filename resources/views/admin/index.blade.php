@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center my-4">
        <h2><i class="bi bi-gear"></i> Управление статьями</h2>
        <a href="{{ route('articles.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Создать статью
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th width="50">ID</th>
                    <th>Заголовок</th>
                    <th width="150">Дата создания</th>
                    <th width="180" class="text-center">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td class="text-center">{{ $article->id }}</td>
                    <td>
                        <strong>{{ $article->title }}</strong>
                        <br>
                        <small class="text-muted">{{ Str::limit($article->short_description, 80) }}</small>
                    </td>
                    <td class="text-center">{{ $article->created_at->format('d.m.Y H:i') }}</td>
                    <td class="text-center">
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-pencil"></i> Редактировать
                        </a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить статью «{{ $article->title }}»?')">
                                <i class="bi bi-trash"></i> Удалить
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $articles->links() }}
    </div>
@endsection