<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    public function index(Request $request)
{
    $query = Movie::with('category')->latest();

    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('category')) {
        $query->where('category_id', $request->category);
    }

    $movies = $query->paginate(6)->withQueryString();

    return view('movies.index', compact('movies'));
}

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }


    public function create()
    {
        $categories = Category::all();
        $movies = Movie::with('category')->latest()->get();
        return view('movies.create', compact('categories', 'movies'));
    }

    public function datamovie()
    {
        $movies = Movie::with('category')->latest()->get();
        return view('movies.datamovie', compact('movies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            // 'year' => 'required|digits:4|integer',
            'year' => 'required|integer|min:1980|max:' . date('Y'),
            'synopsis' => 'nullable|string',
            'actors' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($request->title);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        Movie::create($validated);

        return redirect()->route('movies.index')->with('success', 'Movie created successfully.');
    }



    public function edit(Movie $movie)
    {
        $categories = Category::all();
        return view('movies.edit', compact('movie', 'categories'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'year' => 'required|digits:4|integer',
            'synopsis' => 'nullable',
            'actors' => 'nullable',
            'cover_image' => 'nullable|image',
        ]);

        $validated['slug'] = Str::slug($request->title);
        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $movie->update($validated);

        return redirect()->route('movies.datamovie')->with('success', 'Movie updated successfully.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        
        return redirect()->route('movies.datamovie')->with('success', 'Movie deleted successfully.');
    }
}
