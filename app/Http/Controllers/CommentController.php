<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Сохранение нового комментария
    public function store(Request $request, $articleId)
    {
        $request->validate([
            'content' => 'required|string|min:3|max:1000',
        ]);

        $comment = Comment::create([
            'article_id' => $articleId,
            'user_id' => Auth::id(),
            'content' => $request->content,
            'is_approved' => false,
        ]);

        return redirect()->back()->with('success', 'Комментарий добавлен и ожидает модерации.');
    }

    // Список комментариев на модерацию (только для модератора)
    public function pending()
    {
        if (!auth()->user()->isModerator()) {
            abort(403, 'У вас нет прав для просмотра этой страницы.');
        }

        $comments = Comment::where('is_approved', false)
            ->with(['article', 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.comments', ['comments' => $comments]);
    }

    // Одобрить комментарий
    public function approve($id)
    {
        if (!auth()->user()->isModerator()) {
            abort(403, 'У вас нет прав для этого действия.');
        }

        $comment = Comment::findOrFail($id);
        $comment->update(['is_approved' => true]);

        return redirect()->back()->with('success', 'Комментарий одобрен.');
    }

    // Отклонить/удалить комментарий
    public function reject($id)
    {
        if (!auth()->user()->isModerator()) {
            abort(403, 'У вас нет прав для этого действия.');
        }

        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Комментарий отклонен и удален.');
    }
}