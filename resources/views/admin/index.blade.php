@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center my-4">
        <h2>Управление статьями</h2>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-success">+ Создать статью</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>Заголовок</th><th>Дата</th><th>Действия</th></tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->created_at->format('d.m.Y') }}</td>
                <td>
                    <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-sm btn-primary">Ред.</a>
                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить?')">Уд.</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $articles->links() }}
@endsection