@extends('layouts.master')

@section('title', 'Edit Profile')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Profil</h2>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="age" class="form-label">Umur</label>
            <input type="number" name="age" class="form-control" value="{{ $profile->age }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea name="address" class="form-control" rows="3" required>{{ $profile->address }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Perbarui Profile</button>
    </form>
</div>
@endsection
