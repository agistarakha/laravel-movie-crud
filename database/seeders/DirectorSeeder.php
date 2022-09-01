<?php

namespace Database\Seeders;

use App\Models\Director;
use Illuminate\Database\Seeder;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $directors = ["David Fincher", "Martin Scorcecy", "Gueimo Del Toro", "Hayao Miyazaki"];
        foreach ($directors as $key => $value) {
            Director::create([
                "name" => $value
            ]);
        }
    }
}
