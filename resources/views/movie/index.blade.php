@extends('layouts.main')
@section('content')
<h1>Movies</h1>
<a href="{{ route("movies.create") }}" class="btn btn-success my-2">Add</a>
@foreach ($movies as $movie)
<div class="border d-flex p-2 align-items-center">
    <div class="">{{ $movie->title }}</div>
    <div class="ms-auto">
        <a class="btn btn-warning" href="{{ route("movies.edit",$movie) }}">
        Edit
        </a>
        <form action="{{ route("movies.destroy",$movie) }}" method="POST" class="d-inline">
            @csrf
            @method("DELETE")
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>
</div>
@endforeach
<div class="d-flex justify-content-center mt-5">
    {{ $movies->links() }}

</div>
@endsection