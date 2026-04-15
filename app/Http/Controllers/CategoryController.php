<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('categories.index', [
            'categories' => Category::query()
                ->withCount('articles')
                ->orderBy('name')
                ->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Category::query()->create($this->validatedData($request));

        return redirect()
            ->route('categories.index')
            ->with('success', 'Categorie creee.');
    }

    public function show(Category $category): View
    {
        $category->load([
            'articles' => fn ($query) => $query->orderBy('name'),
        ]);

        return view('categories.show', [
            'category' => $category,
        ]);
    }

    public function edit(Category $category): View
    {
        return view('categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $category->update($this->validatedData($request, $category));

        return redirect()
            ->route('categories.index')
            ->with('success', 'Categorie modifiee.');
    }

    public function destroy(Category $category): RedirectResponse
    {
        if ($category->articles()->exists()) {
            return redirect()
                ->route('categories.index')
                ->with('error', 'Impossible de supprimer une categorie qui contient des articles.');
        }

        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Categorie supprimee.');
    }

    protected function validatedData(Request $request, ?Category $category = null): array
    {
        return $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name')->ignore($category),
            ],
        ]);
    }
}
