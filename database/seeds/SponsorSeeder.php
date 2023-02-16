<?php

use App\models\sponsor;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'price' => 2.99,
                'name' => 'bronze',
                'time' => 24
            ],
            [
                'price' => 5.99,
                'name' => 'silver',
                'time' => 72
            ],
            [
                'price' => 9.99,
                'name' => 'gold',
                'time' => 144
            ]
        ];

        foreach ( $array as  $item ){
            $newSponsor = new Sponsor();
            $newSponsor -> name = $item['name'];
            $newSponsor -> price = $item['price'];
            $newSponsor -> hours = $item['time'];
            $newSponsor -> save();
        }
    }
}
