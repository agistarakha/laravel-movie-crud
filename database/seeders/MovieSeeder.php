<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $movies = ["breaking bad", "The escape", "Friendzonic", "Demonical Coalizer"];

        foreach ($movies as $key => $value) {

            Movie::create([
                "title" => $value,
                "director_id" => rand(1, 4),
                "synopsis" => Str::random(rand(50, 100)),
                "cover" => "covers/test.jpeg",
                "release_date" => Date::today()
            ]);
            DB::table('genre_movie')->insert([
                "movie_id" => $key + 1,
                "genre_id" => 1
            ]);
        }
    }
}
