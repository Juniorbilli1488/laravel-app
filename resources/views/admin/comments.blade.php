@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center my-4">
        <h2><i class="bi bi-chat-dots"></i> Модерация комментариев</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if($comments->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th width="50">ID</th>
                        <th width="150">Статья</th>
                        <th width="150">Автор</th>
                        <th>Комментарий</th>
                        <th width="150">Дата</th>
                        <th width="150" class="text-center">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                    <tr>
                        <td class="text-center">{{ $comment->id }}</td>
                        <td>
                            <a href="{{ route('articles.show', $comment->article_id) }}" target="_blank">
                                {{ Str::limit($comment->article->title, 30) }}
                            </a>
                        </td>
                        <td>{{ $comment->user->name }}</td>
                        <td>{{ Str::limit($comment->content, 100) }}</td>
                        <td>{{ $comment->created_at->format('d.m.Y H:i') }}</td>
                        <td class="text-center">
                            <form action="{{ route('admin.comments.approve', $comment->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="bi bi-check-lg"></i> Одобрить
                                </button>
                            </form>
                            <form action="{{ route('admin.comments.reject', $comment->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Отклонить комментарий?')">
                                    <i class="bi bi-x-lg"></i> Отклонить
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $comments->links() }}
        </div>
    @else
        <div class="alert alert-info text-center">
            <i class="bi bi-info-circle"></i> Нет комментариев, ожидающих модерации.
        </div>
    @endif
@endsection