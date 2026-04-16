<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Mail\NewArticleMail;
use App\Jobs\VeryLongJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class ArticleAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!auth()->user()->isModerator()) {
            abort(403, 'У вас нет прав для просмотра этой страницы.');
        }

        $articles = Article::paginate(10);
        return view('admin.index', ['articles' => $articles]);
    }

    public function create()
    {
        if (!auth()->user()->isModerator()) {
            abort(403, 'У вас нет прав для создания статей.');
        }

        return view('admin.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->isModerator()) {
            abort(403, 'У вас нет прав для создания статей.');
        }

        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'short_description' => 'required|string|min:10|max:500',
            'content' => 'required|string|min:20',
            'preview_image' => 'nullable|string|max:255',
            'full_image' => 'nullable|string|max:255',
        ]);

        $article = Article::create($validated);

        // Отправка письма через очередь
        VeryLongJob::dispatch($article, 'juniorbilli1488@gmail.com');

        return redirect()->route('admin.articles.index')
            ->with('success', 'Статья успешно создана! Уведомление отправлено в очередь.');
    }

    public function edit($id)
    {
        if (!auth()->user()->isModerator()) {
            abort(403, 'У вас нет прав для редактирования статей.');
        }

        $article = Article::findOrFail($id);
        return view('admin.edit', ['article' => $article]);
    }

    public function update(Request $request, $id)
    {
        if (!auth()->user()->isModerator()) {
            abort(403, 'У вас нет прав для редактирования статей.');
        }

        $article = Article::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'short_description' => 'required|string|min:10|max:500',
            'content' => 'required|string|min:20',
            'preview_image' => 'nullable|string|max:255',
            'full_image' => 'nullable|string|max:255',
        ]);

        $article->update($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Статья успешно обновлена!');
    }

    public function destroy($id)
    {
        if (!auth()->user()->isModerator()) {
            abort(403, 'У вас нет прав для удаления статей.');
        }

        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Статья успешно удалена!');
    }
}