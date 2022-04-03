<?php

namespace Database\Seeders;

use App\Models\Camp;
use Illuminate\Database\Seeder;

class CampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $camps = [
            [
                'title' => 'Gila Belajar',
                'slug'  => 'gila-belajar',
                'price' => 280
            ],
            [
                'title' => 'Baru Mulai',
                'slug'  => 'baru-mulai',
                'price' => 140
            ]
        ];
        foreach ($camps as $camp) {
            Camp::create($camp);
        }
    }
}
