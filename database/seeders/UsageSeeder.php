<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 2; $i++) {
            DB::table('usage')->insert([
                'thing_id' => rand(1, 20),
                'place_id' => rand(1, 20),
                'user_id' => rand(1, 20),
                'amount' => rand(1, 10),
            ]);
        }
    }
}
