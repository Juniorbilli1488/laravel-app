@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center my-4">
        <h2>Управление статьями</h2>
        <a href="{{ route('articles.create') }}" class="btn btn-success">+ Создать статью</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Заголовок</th>
                <th>Краткое описание</th>
                <th>Дата создания</th>
                <th width="150">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ Str::limit($article->short_description, 50) }}</td>
                <td>{{ $article->created_at->format('d.m.Y H:i') }}</td>
                <td>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-primary">Редактировать</a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены, что хотите удалить эту статью?')">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-4">
        {{ $articles->links() }}
    </div>
@endsection