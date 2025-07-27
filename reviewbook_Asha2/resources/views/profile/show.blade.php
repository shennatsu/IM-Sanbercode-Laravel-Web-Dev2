@extends('layouts.master')

@section('title', 'Profil Saya')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Profil Saya</h2>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Umur: {{ $profile->age }} tahun</h4>
            <p class="card-text">Alamat: {{ $profile->address }}</p>
            <a href="{{ route('profile.edit') }}" class="btn btn-warning">Edit Profil</a>
        </div>
    </div>
</div>
@endsection
