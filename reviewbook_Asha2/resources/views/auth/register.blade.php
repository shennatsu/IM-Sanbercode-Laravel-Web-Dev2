@extends('layouts.master')
@section('title','Register')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-body">
        <h3 class="text-center mb-4">Register</h3>

        @if ($errors->any())
          <div class="alert alert-danger">
            {{ $errors->first() }}
          </div>
        @endif

        <form method="POST" action="{{ url('/register') }}">
          @csrf
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
          </div>

          <button class="btn btn-success w-100" type="submit">Register</button>
        </form>

        <p class="mt-3 text-center">
          Sudah punya akun? <a href="{{ route('login') }}">Login</a>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
