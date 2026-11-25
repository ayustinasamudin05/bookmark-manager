<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
public function index(Request $request)
{
    $categories = $request->user()
        ->categories()
        ->latest()
        ->get();

    return view('categories.index', compact('categories'));
}

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $request->user()->categories()->create($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(Request $request, Category $category)
{
    $category = $request->user()
        ->categories()
        ->findOrFail($category->id);

    return view('categories.show', compact('category'));
}

    public function edit(Request $request, Category $category)
{
    $category = $request->user()
        ->categories()
        ->findOrFail($category->id);

    return view('categories.edit', compact('category'));
}

   public function update(Request $request, Category $category)
{
    $category = $request->user()
        ->categories()
        ->findOrFail($category->id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $category->update($validated);

    return redirect()->route('categories.index')
        ->with('success', 'Kategori berhasil diperbarui.');
}

    public function destroy(Request $request, Category $category)
{
    $category = $request->user()
        ->categories()
        ->findOrFail($category->id);

    $category->delete();

    return redirect()->route('categories.index')
        ->with('success', 'Kategori berhasil dihapus.');
}

}