<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\FlowerType;

class FlowerTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
 
        // Create 10 FlowerType records
        foreach(range(1,10) as $index)
		{
            FlowerType::create([		
                'name' => $faker->word(10),			
            ]);
        }
    }
}
