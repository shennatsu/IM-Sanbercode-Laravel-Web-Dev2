@extends('layouts.master')
@section('title')
  Register
@endsection

@section('content')
    <form method="POST" action="{{ route('register.post') }}">
        @csrf
        <h1>Buat Account Baru</h1>
        <h2>Sign Up Form</h2>
        <label>First Name :</label><br>
        <input type="text" name="first_name" value="{{ old('first_name') }}"><br><br>

        <label>Last Name :</label><br>
        <input type="text" name="last_name" value="{{ old('last_name') }}"><br><br>

        <label>Gender</label><br>
        <input type="radio" id="Man" name="gender" value="Man">
        <label for="Man">Man</label><br>
        <input type="radio" id="woman" name="gender" value="Woman">
        <label for="woman">Woman</label><br>
        <input type="radio" id="other" name="gender" value="Other">
        <label for="woman">Other</label>
        <br />
        <br />
        <label>Nationality</label> <br>
            <select name="nationality">
                <option value="1">Indonesia</option>
                <option value="2">USA</option>
                <option value="3">Singapore</option>
                <option value="4">Japan</option>
                <option value="5">Australia</option>
            </select>
            <br />
            <br />

            <label>Language Spoken</label> <br />
            <input type="checkbox" value="1" name="languange" />Bahasa Indonesia <br />
            <input type="checkbox" value="2" name="Languange" />English <br />
            <input type="checkbox" value="3" name="Languange" />Arabic <br />
            <input type="checkbox" value="4" name="Languange" />Japanese <br />
            <br />

            <label>Box</label> <br />
            <textarea name="box" cols="50" rows="5"></textarea> <br />
            <br />

        <label>Password</label><br>
        <input type="password" name="password"><br><br>

        <button type="submit">Submit</button>
@endsection
