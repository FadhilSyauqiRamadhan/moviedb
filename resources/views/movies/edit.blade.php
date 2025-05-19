@extends('layouts.main')

@section('content')
<div class="container pt-5 mt-5 mb-5">
    <h1>Edit Film</h1>

    <form action="{{ route('movies.update', $movie) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $movie->title) }}">
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $movie->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tahun</label>
            <input type="text" name="year" class="form-control" value="{{ old('year', $movie->year) }}">
        </div>

        <div class="mb-3">
            <label>Sinopsis</label>
            <textarea name="synopsis" class="form-control">{{ old('synopsis', $movie->synopsis) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Aktor</label>
            <input type="text" name="actors" class="form-control" value="{{ old('actors', $movie->actors) }}">
        </div>

        <div class="mb-3">
            <label>Cover Image</label>
            <input type="file" name="cover_image" class="form-control">
            @if ($movie->cover_image)
                <img src="{{ asset('storage/' . $movie->cover_image) }}" width="100" class="mt-2">
            @endif
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
