<?php

use App\Models\service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services=[
            'wifi',
            'parcheggio gratuito',
            'intrattenimento',
            'fitness',
            'musica',
            'benessere',
            'arte',
            'cottura al forno',
            'animali'
        ];

        foreach($services as $item){
            $newService = new Service();
            $newService -> name = $item;
            $newService -> save();
        }
    }
}
