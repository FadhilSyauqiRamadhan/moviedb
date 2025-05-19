@extends('layouts.main')

@section('content')
<div class="container pt-5 mt-5 mb-5">
    <h1>Tambah Film</h1>

    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tahun</label>
            <input type="text" name="year" class="form-control" value="{{ old('year') }}">
        </div>

        <div class="mb-3">
            <label>Sinopsis</label>
            <textarea name="synopsis" class="form-control">{{ old('synopsis') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Aktor</label>
            <input type="text" name="actors" class="form-control" value="{{ old('actors') }}">
        </div>

        <div class="mb-3">
            <label>Cover Image</label>
            <input type="file" name="cover_image" class="form-control">
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
