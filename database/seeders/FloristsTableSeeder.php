<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Florist;

class FloristsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
 
        // Create 10 Florist records
        foreach(range(1,10) as $index)
		{
            Florist::create([
                'name' => $faker->name(30),
                'email' => $faker->unique()->email,				
                'phone' => $faker->phoneNumber(20),
                'bio' => $faker->text(240),
                'experience' => $faker->word(30),
                'speciality' => $faker->text(30),
                'rates' => $faker->numberBetween($min = 1, $max = 1000),				
                'username' => $faker->userName,				
            ]);
        }
    }
}
