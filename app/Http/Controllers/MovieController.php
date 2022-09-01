<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Genre;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Date;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $movies = Movie::latest()->paginate(3);

        return view("movie.index", [
            "movies" => $movies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $genres = Genre::get();

        return view("movie.create", [
            "genres" => $genres,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request)
    {
        //
        $validated = $request->validated();
        $movie = Movie::create($validated);
        $genres = Genre::find($request->genres);
        $movie->genres()->attach($genres);

        return redirect(route("movies.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
        $genres = Genre::get();
        return view("movie.edit", [
            "movie" => $movie,
            "genres" => $genres
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        //
        $movie->genres()->detach();

        $validated = $request->validated();
        Movie::find($movie->id)->update($validated);
        $genres = Genre::find($request->genres);
        $movie->genres()->attach($genres);

        return redirect(route("movies.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
        Movie::find($movie->id)->delete();
        $movie->genres()->detach();
        return redirect(route("movies.index"));
    }
}
