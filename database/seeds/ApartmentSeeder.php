<?php
use App\Models\Apartment;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $newPost = new Apartment();
            $newPost->name = $faker->name();
            $newPost->price = $faker->numberBetween(1, 500);
            $newPost->rooms = $faker->numberBetween(1, 10);    
            $newPost->beds = $faker->numberBetween(1, 7);
            $newPost->baths = $faker->numberBetween(1, 3);
            $newPost->meters = $faker->numberBetween(30, 100);
            $newPost->address = $faker->address();
            $newPost->visibility = $faker->boolean();
            $newPost->description = $faker->words(30, true);
            $newPost->lat = $faker->latitude();
            $newPost->lon = $faker->longitude();
            $newPost->save();
        }
    }
}
