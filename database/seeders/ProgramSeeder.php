<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProgramSeeder extends Seeder
{
    public function run()
    {
        DB::table('programs')->insert([
        [
                    'user_id' => 1,
                    'name' => 'Fat Loss Focus',
                    'description' => 'A plyometric move where you jump and tuck your knees to your chest, improving explosive power and burning fat.',
                    'img' => 'imgs/programs/FLF.jpeg',
                    'type' => 'lose_weight',
                    'level' => 'hard',
                    'duration' => 20,
                    'is_public' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
        [
                    'user_id' => 1,
                    'name' => 'Strength and Hypertrophy Focus',
                    'description' => 'A unilateral movement that targets the quads and glutes, helping to develop leg strength and stability.',
                    'img' => 'imgs/programs/SAHF.jpeg',
                    'type' => 'build_muscle',
                    'level' => 'hard',
                    'duration' => 25,
                    'is_public' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
        [
                    'user_id' => 1,
                    'name' => 'Mobility Focus',
                    'description' => 'A hip thrust variation that stretches the inner thighs and glutes while engaging the core for stability.',
                    'img' => 'imgs/programs/MF.jpeg',
                    'type' => 'improve_flexibility',
                    'level' => "easy",
                    'duration' => 15,
                    'is_public' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
        [
                    'user_id' => 1,
                    'name' => 'Core and Conditioning Focus',
                    'description' => 'A twisting crunch that focuses on the obliques, helping to define the sides of the core.',
                    'img' => 'imgs/programs/CACF.jpeg',
                    'type' => 'lose_weight',
                    'level' => "intermediate",
                    'duration' => 18,
                    'is_public' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
        [
                    'user_id' => 1,
                    'name' => 'Full-Body Focus',
                    'description' => 'A row variation that targets the back and biceps, promoting back thickness and strength.',
                    'img' => 'imgs/programs/FBF.jpeg',
                    'type' => 'build_muscle',
                    'level' => "intermediate",
                    'duration' => 24,
                    'is_public' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
        [
                    'user_id' => 1,
                    'name' => 'Upper Body Focus',
                    'description' => 'A pressing movement that helps improve shoulder mobility and strengthens the deltoids and triceps.',
                    'img' => 'imgs/programs/UPF.jpeg',
                    'type' => 'improve_flexibility',
                    'level' => "intermediate",
                    'duration' => 14,
                    'is_public' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
        [
                    'user_id' => 1,
                    'name' => 'High Intensity',
                    'description' => 'A plyometric move that improves cardiovascular health while targeting the lower body and core.',
                    'img' => 'imgs/programs/HI.jpeg',
                    'type' => 'lose_weight',
                    'level' => "hard",
                    'duration' => 30,
                    'is_public' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
        ]);
    }
}