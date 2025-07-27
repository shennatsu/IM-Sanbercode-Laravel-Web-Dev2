@extends('layouts.master')
@section('title')
    Home
@endsection

@section('content')
@if(Auth::check())
    <h1>
        Selamat datang, {{ Auth::user()->name }}
        @if($age)
            <span style="font-size: 20px; font-weight: normal;">({{ $age }} tahun)</span>
        @endif
    </h1>
    <p>Anda login sebagai {{ Auth::user()->role }}</p>
@else
    <p>Kamu belum login</p>
@endif

<h2>Halo {{ Auth::user()->name }}</h2>
<h3>Terima kasih telah bergabung di Reviewbook. Socical Media kita bersama!</h3>
<a href="{{ url('/') }}">Halaman Utama</a>
@endsection
