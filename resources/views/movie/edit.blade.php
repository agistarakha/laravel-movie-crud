@extends('layouts.main')
@section('content')

<h1>Edit Movies</h1>
<x-movie-form :movie="$movie" :genres="$genres" :directors="$directors"></x-movie-form>

@endsection