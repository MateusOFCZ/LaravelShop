<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class UserProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Faker = Faker::create();

        for ($i=0; $i < 60; $i++) { 
            DB::table('user_product')->insert([
                'product_id'    => $Faker->numberBetween($min = 1, $max = 3),
                'user_id'     => $Faker->numberBetween($min = 2, $max = 20),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
        }
    }
}
