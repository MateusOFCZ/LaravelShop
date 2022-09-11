<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
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
            DB::table('product')->insert([
                'name'          => $Faker->unique()->domainWord(),
                'description'   => $Faker->unique()->text($maxNbChars = 100),
                'model'         => $Faker->tld(),
                'brand'         => $Faker->domainWord(),
                'price'         => $Faker->randomFloat($nbDigits = 2, $min = 10, $max = 999),
                'stock'         => $Faker->numberBetween($min = 0, $max = 50),
            ]);
        }
    }
}
