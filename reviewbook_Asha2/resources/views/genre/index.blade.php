@extends('layouts.master')

@section('content')
    <h2>List Genre</h2>

    @if(auth()->check() && auth()->user()->role === 'admin')
        <a href="{{ route('genre.create') }}" class="btn btn-primary mb-3">Tambah Genre</a>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('genre.index') }}" method="GET" class="mb-3">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari genre..." class="form-control w-50 d-inline">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Genre</th>
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($genres as $genre)
                <tr>
                    <td>{{ $genre->id }}</td>
                    <td>{{ $genre->name }}</td>
                    @if(auth()->check() && auth()->user()->role === 'admin')
                        <td>
                            <a href="{{ route('genre.edit', $genre->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('genre.destroy', $genre->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="{{ auth()->check() && auth()->user()->role === 'admin' ? 3 : 2 }}" class="text-center">Tidak ada genre ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
