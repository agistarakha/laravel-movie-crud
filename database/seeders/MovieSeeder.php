<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
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
                "synopsis" => Str::random(rand(50, 100)),
                "release_date" => Date::today()
            ]);
        }
    }
}
