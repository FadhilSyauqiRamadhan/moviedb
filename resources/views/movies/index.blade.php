
@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-black dark:text-white"> Daftar Film</h2>
        <a href="{{ route('movies.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out
                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            + Tambah Film
        </a>
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
                   transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
        >
            Filter
        </button>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($movies as $movie)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden transition hover:scale-105 hover:shadow-xl">
            <img src="{{ $movie->cover_image ? asset('storage/' . $movie->cover_image) : 'https://via.placeholder.com/400x256?text=No+Image' }}" alt="{{ $movie->title }}" class="w-full h-64 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">{{ $movie->title }}</h3>
                <span class="inline-block bg-indigo-100 text-indigo-800 text-xs font-medium px-2 py-1 rounded mb-2">
                    {{ $movie->category->category_name }}
                </span>

                <p class="text-sm text-gray-600"><strong>Tahun:</strong> {{ $movie->year }}</p>
                <p class="text-sm text-gray-600"><strong>Aktor:</strong> {{ $movie->actors ?? '-' }}</p>
                <p class="text-sm text-gray-600 mt-2">{{ Str::limit($movie->synopsis, 300, '...') }}</p>

            </div>
            <div class="px-4 pb-4 flex justify-between items-center">
                <a href="{{ route('movies.edit', $movie->id) }}" class="text-yellow-600 hover:underline text-sm font-medium">Edit</a>
                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus film ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:underline text-sm font-medium">Hapus</button>
                </form>
            </div>
        </div>
        @empty
            <p class="col-span-3 text-center text-gray-600">Film tidak ditemukan.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $movies->links() }}
    </div>
</div>
@endsection
