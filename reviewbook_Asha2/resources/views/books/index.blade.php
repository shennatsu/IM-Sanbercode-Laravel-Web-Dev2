@extends('layouts.master')

@section('title')
    Halaman Utama
@endsection

@section('content')
    @auth
        @if (Auth::user()->role === 'admin')
            <a href="{{ route('books.create') }}" class="btn btn-primary mb-4">Tambah Buku</a>
        @endif
    @endauth

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($books as $book)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if ($book->image)
                    <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top" alt="{{ $book->title }}">
                    @else
                        <img src="https://via.placeholder.com/150x200?text=No+Image" class="card-img-top" alt="Tidak ada gambar">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        @if ($book->genre)
                            <p class="card-text"><strong>Genre:</strong> {{ $book->genre->name }}</p>
                        @else
                            <p class="card-text text-muted"><strong>Genre:</strong> Tidak tersedia</p>
                        @endif


                        <div class="mt-auto">
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">Lihat</a>

                            @auth
                                @if (Auth::user()->role === 'admin')
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
