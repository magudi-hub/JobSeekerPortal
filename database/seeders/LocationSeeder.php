<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createMultipleCities = [
            [
                'city' => 'Ahmadabad',
            ],
            [
                'city' => 'Bangalore',
            ],
            [
                'city' => 'Chennai',
            ],
            [
                'city' => 'Coimbatore',
            ],
            [
                'city' => 'Delhi',
            ],
            [
                'city' => 'Hyderabad',
            ],
            [
                'city' => 'Karnataka',
            ],
            [
                'city' => 'Kerala',
            ],
            [
                'city' => 'Kolkata',
            ],
            [
                'city' => 'Mumbai',
            ]
        ];

        Location::insert($createMultipleCities);
    }
}
