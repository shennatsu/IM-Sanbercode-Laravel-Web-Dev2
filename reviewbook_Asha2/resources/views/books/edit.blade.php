@extends('layouts.master')

@section('title', 'Edit Buku')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Buku</h2>

    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" class="form-control" 
                   value="{{ old('title', $book->title) }}" required>
        </div>

        {{-- Summary --}}
        <div class="mb-3">
            <label for="summary" class="form-label">Ringkasan</label>
            <textarea name="summary" id="summary" class="form-control" rows="3" required>{{ old('summary', $book->summary) }}</textarea>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $book->description) }}</textarea>
        </div>

        {{-- Genre --}}
        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select name="genre_id" id="genre_id" class="form-select" required>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $book->genre_id == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Stok --}}
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" 
                   value="{{ old('stok', $book->stok) }}" min="0" required>
        </div>

        {{-- Gambar --}}
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Buku (Opsional)</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($book->image)
                <small class="text-muted">Gambar saat ini: {{ $book->image }}</small>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
