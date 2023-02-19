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
            $newPost->rooms = $faker->between(1, 10);
            $newPost->beds = $faker->between(1, 7);
            $newPost->baths = $faker->between(1, 3);
            $newPost->meters = $faker->between(30, 100);
            $newPost->address = $faker->address();
            $newPost->visibility = $faker->boolean();
            $newPost->description = $faker->words(30, true);
            $newPost->cover = $faker->abstract(1234, 2345);
            $newPost->lat = $faker->latitude();
            $newPost->lon = $faker->number(5);
            $newPost->save();
        }
    }
}
