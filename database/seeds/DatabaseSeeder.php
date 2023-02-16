<?php

use App\Models\service;
use App\Models\sponsor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call(
            [
            SponsorSeeder::class,
            ServiceSeeder::class,
            ]
        );
    }
}
