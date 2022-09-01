@extends('layouts.main')
@section('content')

<h1>Add Movies</h1>
<x-movie-form movie="" :genres="$genres" :directors="$directors"></x-movie-form>
@endsection