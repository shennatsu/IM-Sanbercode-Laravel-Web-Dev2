@extends('layouts.master')
@section('title','Login')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-body">
        <h3 class="text-center mb-4">Login</h3>

        @if ($errors->any())
          <div class="alert alert-danger">
            {{ $errors->first() }}
          </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>

          <button class="btn btn-primary w-100" type="submit">Login</button>
        </form>

        <p class="mt-3 text-center">
          Belum punya akun? <a href="{{ route('register') }}">Register</a>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
