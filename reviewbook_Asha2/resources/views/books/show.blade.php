@extends('layouts.master')

@section('title', 'Detail Buku')

@section('content')
<div class="container py-4">
    <div class="text-center mb-4">
        <h2 class="fw-bold">{{ $book->title }}</h2>
    </div>

    @if ($book->image)
        <div class="text-center mb-4">
            <img src="{{ asset('storage/' . $book->image) }}" alt="Gambar Buku" 
                 class="img-fluid rounded shadow" style="max-width: 70%; height: auto;">
        </div>
    @endif

    <div class="mb-3">
        <h5><strong>Summary:</strong></h5>
        <p>{{ $book->summary }}</p>
    </div>

    <div class="mb-3">
        <h5><strong>Deskripsi:</strong></h5>
        <p>{{ $book->description }}</p>
    </div>

    <div class="mb-3">
        <p><strong>Genre:</strong> {{ $book->genre->name }}</p>
        <p><strong>Stok:</strong> {{ $book->stok }}</p>
    </div>

    @auth
        @if(auth()->user()->role === 'admin')
            <div class="mt-4 d-flex gap-2">
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit Buku</a>

                <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus Buku</button>
                </form>
            </div>
        @endif
    @endauth

    <div class="mt-4">
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali ke Daftar Buku</a>
    </div>

    {{-- Komentar --}}
    <div class="mt-5">
        <h4>Komentar</h4>

        @auth
            <form action="{{ route('comments.store', $book->id) }}" method="POST">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <div class="mb-3">
                    <textarea name="content" class="form-control" rows="3" placeholder="Tulis komentar...">{{ old('content') }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Kirim Komentar</button>
            </form>
        @else
            <p class="text-muted">Silakan <a href="{{ route('login') }}">login</a> untuk menulis komentar.</p>
        @endauth

        {{-- Daftar komentar --}}
        <div class="mt-4">
        @forelse ($book->comments as $comment)
                <div>
                    <strong>{{ $comment->user->name ?? 'Anonim' }}</strong>
                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                    <p>{{ $comment->content }}</p>
                </div>
            @empty
                <p>Belum ada komentar.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
