@extends('layout.app')

@section('content')
<h2 class="text-center">dashboard</h2>
<form action="{{route('logout')}}" method="get">
    <button type="submit" class="btn btn-secondary">Log Out</button>
</form>
@endsection