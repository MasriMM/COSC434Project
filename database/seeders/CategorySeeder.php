<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Protein', 'description' => 'Protein powders and supplements'],
            ['name' => 'Performance', 'description' => 'Performance enhancing supplements'],
            ['name' => 'Health', 'description' => 'Supplements for overall health'],
            ['name' => 'Vitamins', 'description' => 'Multivitamins and minerals'],
            ['name' => 'Amino Acids', 'description' => 'BCAA, EAA and others'],
            ['name' => 'Energy', 'description' => 'Pre-workouts and energy boosters'],
            ['name' => 'Fat Burner', 'description' => 'Fat loss supplements'],
            ['name' => 'Weight Gain', 'description' => 'High-calorie gainers'],
            ['name' => 'Protein Bar', 'description' => 'Snack bars rich in protein'],
            ['name' => 'Energy Drink', 'description' => 'Caffeinated energy beverages'],
        ]);
    }
}
