<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class SupplementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id', 'name')->toArray();

         DB::table('supplements')->insert([
        [
            'name' => 'Whey Protein',
            'description' => 'High-quality protein for muscle recovery',
            'category_id' => $categories['Protein'],
            'price' => 39.99,
            'stock' => 50,
            'image' => '/imgs/whey.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Creatine Monohydrate',
            'description' => 'Supports muscle strength and endurance',
            'category_id' => $categories['Performance'],
            'price' => 24.99,
            'stock' => 100,
            'image' => '/imgs/creatine monohydrate.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Omega-3',
            'description' => 'Supports heart and brain health',
            'category_id' => $categories['Health'],
            'price' => 14.99,
            'stock' => 75,
            'image' => '/imgs/omega-3.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Multivitamin',
            'description' => 'Essential vitamins and minerals for daily health',
            'category_id' => $categories['Vitamins'],
            'price' => 19.99,
            'stock' => 60,
            'image' => '/imgs/multivitamin.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'BCAA Powder',
            'description' => 'Enhances muscle recovery and reduces fatigue',
            'category_id' => $categories['Amino Acids'],
            'price' => 29.99,
            'stock' => 40,
            'image' => '/imgs/BCCA.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Pre-Workout',
            'description' => 'Boosts energy and focus before workouts',
            'category_id' => $categories['Energy'],
            'price' => 34.99,
            'stock' => 30,
            'image' => '/imgs/Pre-workout.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Caffeine Pills',
            'description' => 'Provides a quick and effective energy boost',
            'category_id' => $categories['Energy'],
            'price' => 12.99,
            'stock' => 80,
            'image' => '/imgs/cafeine.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Fat Burner X',
            'description' => 'Helps with fat metabolism and weight loss',
            'category_id' => $categories['Fat Burner'],
            'price' => 39.99,
            'stock' => 35,
            'image' => '/imgs/FatBurnerX.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Thermo Burn',
            'description' => 'Increases metabolism and supports fat loss',
            'category_id' => $categories['Fat Burner'],
            'price' => 44.99,
            'stock' => 25,
            'image' => '/imgs/thermoBurn.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Mass Gainer',
            'description' => 'High-calorie supplement for muscle gain',
            'category_id' => $categories['Weight Gain'],
            'price' => 49.99,
            'stock' => 20,
            'image' => '/imgs/MassGainer.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Protein Bar - Chocolate',
            'description' => 'Tasty chocolate protein bar with 20g of protein',
            'category_id' => $categories['Protein Bar'],
            'price' => 2.99,
            'stock' => 100,
            'image' => '/imgs/Proteinchocolate.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Protein Bar - Peanut Butter',
            'description' => 'Delicious peanut butter bar with high protein',
            'category_id' => $categories['Protein Bar'],
            'price' => 2.99,
            'stock' => 80,
            'image' => '/imgs/ProteinBarPeanut.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Energy Drink - Citrus Blast',
            'description' => 'Refreshing citrus-flavored energy drink',
            'category_id' => $categories['Energy Drink'],
            'price' => 3.49,
            'stock' => 50,
            'image' => '/imgs/EnergyCitrus.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Energy Drink - Berry Boost',
            'description' => 'Berry-flavored energy drink with caffeine boost',
            'category_id' => $categories['Energy Drink'],
            'price' => 3.49,
            'stock' => 60,
            'image' => '/imgs/EnergyBerry.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Energy Drink - Tropical Thunder',
            'description' => 'Tropical flavor with natural energy ingredients',
            'category_id' => $categories['Energy Drink'],
            'price' => 3.49,
            'stock' => 40,
            'image' => '/imgs/EnergyTropical.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        ]);
    }
}
