<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *

     * @return void
     */
    public function run()
    {

	$this->call([
		UsersTableSeeder::class,
		AppDefaultsTableSeeder::class,
		BannersTableSeeder::class,
		BouquetsTableSeeder::class,
		BouquetTypesTableSeeder::class,	
		ClientsReportsTableSeeder::class,
		ClientsTableSeeder::class,
		EquipmentTableSeeder::class,
		FeaturesTableSeeder::class,	
	    FloristsTableSeeder::class,
		FlowersTableSeeder::class,
		FlowerTypesTableSeeder::class,
		GalleryImagesTableSeeder::class,		
		MailPostsTableSeeder::class,
		MailSubscriptionsTableSeeder::class,		
		MessagesReportsTableSeeder::class,
		MessagesTableSeeder::class,
		NewslettersTableSeeder::class,		
		PlansTableSeeder::class,
		//ProfilesTableSeeder::class,
		ProjectsReportsTableSeeder::class,
		//ProjectsTableSeeder::class,
		ProjectTypesTableSeeder::class,	
		ServicesTableSeeder::class,
		SubsReportsTableSeeder::class,
		SupportsTableSeeder::class,
		TestimonialsTableSeeder::class,
		UsersReportsTableSeeder::class,
	]);
    }

}
