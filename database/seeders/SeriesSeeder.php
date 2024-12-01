<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Series;
use App\Models\Category;

class SeriesSeeder extends Seeder
{
    public function run()
    {
        // Define the series names
        $series = [
            // Running
            'Vaporfly',
            'Pegasus',
            'Zoom',
            'Revolution',
            // Football
            'Mercurial',
            'Tiempo',
            'Phantom',
            'Vapor',
            // Basketball
            'Air Jordan',
            'Le Bron',
            'Luka',
            'G.T.',
            // Gym & Training
            'Metcon',
            'Flex',
            'Air Max',
            'Reax',
            // Lifestyle
            'Court Vision',
            'Air Force',
            'P-6000',
            'Dunk Low',
        ];

        // Loop through each series and create it
        foreach ($series as $seriesName) {
            // Fetch a random category_id from the categories table
            $categoryId = Category::inRandomOrder()->first()->id;

            // Insert the series into the series table with category_id
            Series::create([
                'name' => $seriesName,
                'category_id' => $categoryId, // assign a random category_id
            ]);
        }
    }
}
