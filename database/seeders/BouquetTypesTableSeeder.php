<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\BouquetType;

class BouquetTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
 
        // Create 10 BouquetType records
        foreach(range(1,10) as $index)
		{
            BouquetType::create([		
                'name' => $faker->word(10),			
            ]);
        }
    }
}
