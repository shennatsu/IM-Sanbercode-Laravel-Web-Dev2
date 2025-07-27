@extends('layouts.master')

@section('title')
    Edit Genre
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Genre</h4>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

  <form action="{{ route('genres.update', $genre->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Genre Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $genre->name) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Genre Description</label>
                <textarea class="form-control" name="description" rows="3">{{ old('description', $genre->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/genre" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
