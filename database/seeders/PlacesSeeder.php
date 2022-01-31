<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            DB::table('places')->insert([
                'name' => Str::random(10),
                'description' => Str::random(10),
                'repair' => Str::random(10),
                'work' => Str::random(10),
            ]);
        }
    }
}
