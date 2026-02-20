<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    public function index()
    {
        $categories = PostCategory::all();
        return view('pages.post.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.post.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        PostCategory::create($request->all());

        return redirect()->route('post.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(PostCategory $category)
    {
        return view('pages.post.categories.edit', compact('category'));
    }

    public function update(Request $request, PostCategory $category)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $category->update($request->all());

        return redirect()->route('post.categories.index')
            ->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy(PostCategory $category)
    {
        $category->delete();
        return redirect()->route('post.categories.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}
