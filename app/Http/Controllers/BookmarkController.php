<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = $request->input('search');
    $categoryId = $request->input('category');

    $bookmarks = $request->user()
        ->bookmarks()
        ->with('category')
        ->when($query, function ($builder, $query) {
            $builder->where(function ($search) use ($query) {
                $search->where('title', 'like', "%{$query}%")
                    ->orWhere('url', 'like', "%{$query}%");
            });
        })
        ->when($categoryId, function ($builder, $categoryId) use ($request) {
            $request->user()->categories()->findOrFail($categoryId);

            $builder->where('category_id', $categoryId);
        })
        ->latest()
        ->get();

    $categories = $request->user()
        ->categories()
        ->orderBy('name')
        ->get();

    return view('bookmarks.index', compact(
        'bookmarks',
        'query',
        'categories',
        'categoryId'
    ));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
{
    $categories = $request->user()
        ->categories()
        ->orderBy('name')
        ->get();

    return view('bookmarks.create', compact('categories'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'category_id' => 'required|integer',
        'title' => 'required|string|max:255',
        'url' => 'required|url|max:2048',
        'description' => 'nullable|string',
        'is_favorite' => 'nullable|boolean',
    ]);

    // Pastikan kategori benar-benar milik pengguna yang login
    $request->user()
        ->categories()
        ->findOrFail($validated['category_id']);

    // Atur status favorit berdasarkan checkbox
    $validated['is_favorite'] = $request->boolean('is_favorite');

    // Simpan bookmark atas nama pengguna yang login
    $request->user()->bookmarks()->create($validated);

    return redirect()->route('bookmarks.index')
        ->with('success', 'Bookmark berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Bookmark $bookmark)
{
    $bookmark = $request->user()
        ->bookmarks()
        ->with('category')
        ->findOrFail($bookmark->id);

    return view('bookmarks.show', compact('bookmark'));
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Bookmark $bookmark)
{
    $bookmark = $request->user()
        ->bookmarks()
        ->findOrFail($bookmark->id);

    $categories = $request->user()
        ->categories()
        ->orderBy('name')
        ->get();

    return view('bookmarks.edit', compact('bookmark', 'categories'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bookmark $bookmark)
{
    $bookmark = $request->user()
        ->bookmarks()
        ->findOrFail($bookmark->id);

    $validated = $request->validate([
        'category_id' => 'required|integer',
        'title' => 'required|string|max:255',
        'url' => 'required|url|max:2048',
        'description' => 'nullable|string',
        'is_favorite' => 'nullable|boolean',
    ]);

    // Pastikan kategori merupakan milik pengguna yang login
    $request->user()
        ->categories()
        ->findOrFail($validated['category_id']);

    $validated['is_favorite'] = $request->boolean('is_favorite');

    $bookmark->update($validated);

    return redirect()->route('bookmarks.index')
        ->with('success', 'Bookmark berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Bookmark $bookmark)
{
    $bookmark = $request->user()
        ->bookmarks()
        ->findOrFail($bookmark->id);

    $bookmark->delete();

    return redirect()->route('bookmarks.index')
        ->with('success', 'Bookmark berhasil dihapus.');
}

public function favorites(Request $request)
{
    $bookmarks = $request->user()
        ->bookmarks()
        ->with('category')
        ->where('is_favorite', true)
        ->latest()
        ->get();

    return view('bookmarks.favorites', compact('bookmarks'));
}

}


