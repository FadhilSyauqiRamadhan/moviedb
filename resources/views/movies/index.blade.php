@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-black dark:text-white">Daftar Film</h2>
        {{-- <a href="{{ route('movies.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out
                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            + Tambah Film
        </a> --}}
    </div>

    <form method="GET" class="mb-8 flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-4 sm:space-y-0">
        <input
            type="text" name="search" value="{{ request('search') }}"
            placeholder="Cari judul film..."
            class="flex-grow sm:flex-shrink-0 px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                   focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent
                   dark:bg-gray-800 dark:text-white dark:border-gray-600"
        >
        <select name="category"
            class="w-full sm:w-48 px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                   focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent
                   dark:bg-gray-800 dark:text-white dark:border-gray-600">
            <option value="">Semua Kategori</option>
            @foreach(App\Models\Category::all() as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
        <button
            class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md
                   transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            Filter
        </button>
    </form>

    <div class="row">
        @forelse($movies as $movie)
        <div class="col-lg-6 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <div class="row g-0 h-100">
                    <div class="col-md-4">
                        @php
                            $imageSrc = Str::startsWith($movie->cover_image, 'http')
                                ? $movie->cover_image
                                : asset('storage/' . $movie->cover_image);
                        @endphp
                        <img src="{{ $imageSrc }}" class="img-fluid h-100 rounded-start object-fit-cover" alt="{{ $movie->title }}" style="object-fit: cover;">
                    </div>
                    <div class="col-md-8 d-flex flex-column p-3">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <p class="card-text text-muted mb-2">
                            <strong>Kategori:</strong> {{ $movie->category->category_name ?? '-' }}<br>
                            <strong>Tahun:</strong> {{ $movie->year }}<br>
                            <strong>Actors:</strong> {{ $movie->actors ?? '-' }}<br>
                            <strong>Sinopsis:<br></strong> {{ Str::limit($movie->synopsis, 100, '...') }}
                            <div class="text-end mt-2">
                                <a href="{{ route('movies.show', $movie->slug) }}" class="btn btn-sm btn-success ms-2">
                                    <i class="bi bi-eye"></i> Read More
                                </a>
                            </div>
                        </p>
                        {{-- <div class="mt-auto d-flex justify-content-between">
                            <a href="{{ route('movies.edit', $movie->id) }}" class="text-warning text-sm font-medium">Edit</a>
                            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus film ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-danger text-sm font-medium">Hapus</button>
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p class="col-12 text-center text-gray-600">Film tidak ditemukan.</p>
        @endforelse
    </div>



    <div class="mt-4">
        {{ $movies->links() }}
    </div>
</div>
@endsection
