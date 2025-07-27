@extends('layouts.master')

@section('title', 'Halaman Genre')

@section('content')

<h2>List Genre</h2>

{{-- Form Search --}}
<form action="{{ route('genre.index') }}" method="GET" class="mb-3 d-flex w-50">
  <input type="text" name="search" class="form-control me-2" placeholder="Cari genre..." value="{{ request('search') }}">
  <button type="submit" class="btn btn-primary">Cari</button>
</form>

{{-- Tombol Create --}}
<a href="{{ route('genre.create') }}" class="btn btn-success mb-3">+ Tambah Genre</a>

{{-- Notifikasi sukses --}}
@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Tabel --}}
<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Nama Genre</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($genres as $genre)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $genre->name }}</td>
        <td>
          <a href="{{ route('genre.edit', $genre->id) }}" class="btn btn-warning btn-sm">Edit</a>
          <form action="{{ route('genre.destroy', $genre->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus genre ini?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Delete</button>
          </form>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="3" class="text-center">Genre belum tersedia.</td>
      </tr>
    @endforelse
  </tbody>
</table>

@endsection
