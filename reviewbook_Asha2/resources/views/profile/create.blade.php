@extends('layouts.master')

@section('title', 'Buat Profile')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Buat Profil</h2>
    <form action="{{ route('profile.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="age" class="form-label">Umur</label>
            <input type="number" name="age" class="form-control" placeholder="Masukkan umur" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea name="address" class="form-control" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Profile</button>
    </form>
</div>
@endsection
