<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CompanyProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Faker = Faker::create();

        for ($i=0; $i < 15; $i++) { 
            DB::table('company_product')->insert([
                'sell_period'   => $Faker->dateTimeBetween($startDate = 'now', $endDate = '+1 month', $timezone = 'America/Sao_Paulo'),
                'product_id'    => $Faker->numberBetween($min = 1, $max = 3),
                'company_id'    => $Faker->numberBetween($min = 1, $max = 3),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
        }
    }
}
