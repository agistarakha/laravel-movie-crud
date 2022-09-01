<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $genres = ["Action", "Romance", "Thriller", "Horror", "Fantasy", "Sci-Fi"];
        foreach ($genres as $key => $value) {
            Genre::create(["name" => $value]);
        }
    }
}
