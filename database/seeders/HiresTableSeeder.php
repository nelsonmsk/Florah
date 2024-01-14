<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Hire;

class HiresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
 
        // Create 10 Hires records
        foreach(range(1,10) as $index)
		{
            Hire::create([
                'fromDate' => $faker->date(),			
                'fromTime' => $faker->time(),
                'toDate' => $faker->date(),
				'toTime' => $faker->time(),
                'hireCost' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000),
                'hireDetails' => $faker->text(240),
				'status' => $faker->text(12),					
                'user_id' => $faker->numberBetween($min = 1, $max = 1000),				
            ]);
        }
    }
}
