<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Faker = Faker::create();

        for ($i=0; $i < 3; $i++) { 
            DB::table('company')->insert([
                'address'   => $Faker->unique()->address(),
                'phone'     => $Faker->unique()->numerify('+55 (48) 9 ####-####'),
                'email'     => $Faker->unique()->safeEmail(),
            ]);
        }
    }
}
