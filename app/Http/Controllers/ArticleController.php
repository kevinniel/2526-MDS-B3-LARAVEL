<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        return view('articles.index', [
            'articles' => Article::query()
                ->with('category')
                ->latest()
                ->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('articles.create', [
            'categories' => Category::query()->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $article = Article::query()->create($this->validatedData($request));

        return redirect()
            ->route('articles.show', $article)
            ->with('success', 'Article cree.');
    }

    public function show(Article $article): View
    {
        $article->load('category');

        return view('articles.show', [
            'article' => $article,
        ]);
    }

    public function edit(Article $article): View
    {
        return view('articles.edit', [
            'article' => $article,
            'categories' => Category::query()->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $article->update($this->validatedData($request));

        return redirect()
            ->route('articles.show', $article)
            ->with('success', 'Article modifie.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Article supprime.');
    }

    protected function validatedData(Request $request): array
    {
        return $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);
    }
}
