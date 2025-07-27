@extends('layouts.master')

@section('title', 'Create Book')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Buku Baru</h2>

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Judul --}}
        <div class="mb-3">
            <label for="title" class="form-label">Judul Buku</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Masukkan judul buku" required>
        </div>

        {{-- Summary --}}
        <div class="mb-3">
            <label for="summary" class="form-label">Ringkasan</label>
            <textarea name="summary" id="summary" class="form-control" placeholder="Tulis ringkasan buku" rows="3" required></textarea>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" placeholder="Tulis deskripsi buku" rows="4" required></textarea>
        </div>

        {{-- Genre --}}
        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select name="genre_id" id="genre_id" class="form-select" required>
                <option value="" disabled selected>Pilih genre</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Gambar --}}
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Buku</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>

        {{-- Stok --}}
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" min="0" required>
        </div>

        {{-- Tombol Submit --}}
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
