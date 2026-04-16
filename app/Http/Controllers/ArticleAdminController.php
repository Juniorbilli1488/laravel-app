<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleAdminController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(10);
        return view('admin.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'short_description' => 'required|string|min:10|max:500',
            'content' => 'required|string|min:20',
            'preview_image' => 'nullable|string|max:255',
            'full_image' => 'nullable|string|max:255',
        ]);

        Article::create($validated);

        return redirect()->route('articles.index')
            ->with('success', 'Статья успешно создана!');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.edit', ['article' => $article]);
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'short_description' => 'required|string|min:10|max:500',
            'content' => 'required|string|min:20',
            'preview_image' => 'nullable|string|max:255',
            'full_image' => 'nullable|string|max:255',
        ]);

        $article->update($validated);

        return redirect()->route('articles.index')
            ->with('success', 'Статья успешно обновлена!');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Статья успешно удалена!');
    }
}