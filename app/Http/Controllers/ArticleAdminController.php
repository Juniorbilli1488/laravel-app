<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticleAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!Gate::allows('viewAny', Article::class)) {
            abort(403, 'У вас нет прав для просмотра этой страницы.');
        }

        $articles = Article::paginate(10);
        return view('admin.index', ['articles' => $articles]);
    }

    public function create()
    {
        if (!Gate::allows('create', Article::class)) {
            abort(403, 'У вас нет прав для создания статей.');
        }

        return view('admin.create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('create', Article::class)) {
            abort(403, 'У вас нет прав для создания статей.');
        }

        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'short_description' => 'required|string|min:10|max:500',
            'content' => 'required|string|min:20',
            'preview_image' => 'nullable|string|max:255',
            'full_image' => 'nullable|string|max:255',
        ]);

        Article::create($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Статья успешно создана!');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        if (!Gate::allows('update', $article)) {
            abort(403, 'У вас нет прав для редактирования статей.');
        }

        return view('admin.edit', ['article' => $article]);
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        if (!Gate::allows('update', $article)) {
            abort(403, 'У вас нет прав для редактирования статей.');
        }

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
        $article = Article::findOrFail($id);

        if (!Gate::allows('delete', $article)) {
            abort(403, 'У вас нет прав для удаления статей.');
        }

        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Статья успешно удалена!');
    }
}