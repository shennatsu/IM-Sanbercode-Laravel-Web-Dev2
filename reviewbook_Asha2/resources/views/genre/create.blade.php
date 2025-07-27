@extends('layouts.master')

@section('title')
    Halaman Tambah Genre
@endsection

@section('content')
   <form action="{{ route('genre.store') }}" method="POST">
    @csrf

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="mb-3">
        <label class="form-label">Genre Name</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Genre Description</label>
        <textarea class="form-control" name="description">{{ old('description') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
