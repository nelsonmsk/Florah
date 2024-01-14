<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
 
        // Create 10 Order records
        foreach(range(1,10) as $index)
		{
            Order::create([
                'orderDate' => $faker->date(),
                'sku' => $faker->uuid(),
                'items' => $faker->text(240),
                'subTotal' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000),
                'sRequest' => $faker->text(240),				
                'status' => $faker->text(12),				
                'user_id' => $faker->numberBetween($min = 1, $max = 1000),				
            ]);
        }
   
    
    }
}

