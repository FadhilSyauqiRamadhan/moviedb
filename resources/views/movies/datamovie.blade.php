
@extends('layouts.main')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="text-3xl font-bold text-black dark:text-white">Daftar Film</h2>
    <a href="{{ route('movies.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Film
    </a>
</div>

<table class="table table-bordered mt-4">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Tahun</th>
            <th>Aktor</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($movies as $movie)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $movie->title }}</td>
            <td>{{ $movie->category->category_name ?? '-' }}</td>
            <td>{{ $movie->year }}</td>
            <td>{{ $movie->actors }}</td>
            <td>
                <a href="{{ route('movies.show', $movie->slug) }}" class="btn btn-info btn-sm">Show</a>
                <a href="{{ route('movies.edit', $movie->slug) }}" class="btn btn-warning btn-sm">Edit</a>
                
                @can('delete')
                     <form action="{{ route('movies.destroy', $movie->slug) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus film ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
                @endcan

            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Belum ada data movie.</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection


