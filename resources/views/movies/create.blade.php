{{-- filepath: resources/views/movies/create.blade.php --}}
@extends('layouts.main')

@section('content')
<div class="container pt-5 mt-5 mb-5">
    <h1 class="mb-4">Tambah Film</h1>
    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback ">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Tahun</label>
            <input type="text" name="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}">
            @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Sinopsis</label>
            <textarea name="synopsis" class="form-control @error('synopsis') is-invalid @enderror">{{ old('synopsis') }}</textarea>
            @error('synopsis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Aktor</label>
            <input type="text" name="actors" class="form-control @error('actors') is-invalid @enderror" value="{{ old('actors') }}">
            @error('actors')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Cover Image</label>
            <input type="file" name="cover_image" class="form-control @error('cover_image') is-invalid @enderror">
            @error('cover_image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
