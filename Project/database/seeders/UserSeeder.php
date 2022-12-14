<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Carbon\Carbon;

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
            'first_name'    => 'Admin',
            'last_name'     => 'Administrator',
            'email'         => 'admin@admin.com',
            'password'      => Hash::make('123'),
            'company_id'    => 1,
            'admin'         => true,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        for ($i=0; $i < 19; $i++) { 
            DB::table('user')->insert([
                'first_name'    => $Faker->unique()->firstName(),
                'last_name'     => $Faker->unique()->lastName(),
                'email'         => $Faker->unique()->safeEmail(),
                'password'      => Hash::make('123'),
                'company_id'    => $Faker->numberBetween($min = 1, $max = 3),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
        }
    }
}
