<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Bouquet;

class BouquetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
 
        // Create 10 Bouquet records
        foreach(range(1,10) as $index)
		{
            Bouquet::create([
                'type' => $faker->text(30),			
                'name' => $faker->text(30),
                'sku' => $faker->uuid(),
				'description' => $faker->text(120),				
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000),
                'username' => $faker->userName,				
            ]);
        }
    }
}
