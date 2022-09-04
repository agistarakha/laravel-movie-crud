@extends('layouts.main')
@section('content')
<h1>Movies</h1>
<a href="{{ route("movies.create") }}" class="btn btn-success my-2">Add</a>
<div class="mb-2">
    <form action="/movies" class="d-flex mt-5 gap-1">
            <input type="text" name="search" id="search" placeholder="Search movie title" class="flex-grow-1">
            <button type="submit" class="btn btn-primary">search</button>
        </form>
</div>
<div class="d-flex justify-content-between">
@foreach ($movies as $movie)
    <div class="border border-1 border-secondary d-flex flex-column p-2 align-items-center rounded-2 shadow gap-2" style="background-color: rgb(214, 214, 214)">
        <div class=""><strong>{{ $movie->title }}</strong></div>
        <img src="{{ asset("storage/".$movie->cover) }}" alt="" class="img-fluid rounded" style="width:300px;height:400px;object-fit:cover">
        <div class="">
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
</div>

<div class="d-flex justify-content-center mt-5">
    {{ $movies->links() }}

</div>
@endsection