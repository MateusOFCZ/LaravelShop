<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Faker = Faker::create();

        DB::table('user')->insert([
            'fisrt_name'    => $Faker->unique()->firstName(),
            'last_name'     => $Faker->unique()->lastName(),
            'email'         => $Faker->unique()->safeEmail(),
            'password'      => Hash::make('123'),
            'company_id'    => $Faker->numberBetween($min = 1, $max = 3),
            'admin'         => true,
        ]);

        for ($i=0; $i < 19; $i++) { 
            DB::table('user')->insert([
                'fisrt_name'    => $Faker->unique()->firstName(),
                'last_name'     => $Faker->unique()->lastName(),
                'email'         => $Faker->unique()->safeEmail(),
                'password'      => Hash::make('123'),
                'company_id'    => $Faker->numberBetween($min = 1, $max = 3),
            ]);
        }
    }
}
