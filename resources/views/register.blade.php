@extends('layout.app')

@section('content')

<form action="{{route('registerUser')}}" method="post">
    @csrf
    <div class="col-6 mx-auto">
        <label for="" class="form-label">Name</label>
        <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id=""
            placeholder="Enter your name">
        @error('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
        <br>
        <label for="" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id=""
            placeholder="name@example.com">
        @error('email')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
        <br>
        <label for="" class="form-label">Password</label>
        <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" id=""
            placeholder="Your Password">
        @error('password')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
        <br>
        <button type="submit" class="btn btn-primary">Register</button>
    </div>
</form>
@endsection