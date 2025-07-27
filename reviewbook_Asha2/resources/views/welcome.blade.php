@extends('layouts.master')
@section('title')
    Dashboard
@endsection

@section('content')
    <h1>Selamat Datang {{ $first_name }} {{ $last_name }}</h1>
    <h2>Terima kasih telah bergabung di Sanberbook. Socical Media kita bersama!</h2>
    <a href="{{ url('/') }}">Back to Home</a>
@endsection
