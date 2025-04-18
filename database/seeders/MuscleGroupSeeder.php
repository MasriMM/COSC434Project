<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MuscleGroupSeeder extends Seeder
{
    public function run()
    {
        DB::table('muscle_groups')->insert([
            [
                'name' => 'Chest',
                'description' => 'Includes muscles like the pectoralis major and minor, responsible for pushing movements.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Back',
                'description' => 'Includes muscles like latissimus dorsi, trapezius, and rhomboids, used in pulling motions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shoulders',
                'description' => 'Mainly the deltoid muscles, which help with lifting and rotation of the arms.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Arms',
                'description' => 'Includes biceps, triceps, and forearms, used in both pulling and pushing motions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Legs',
                'description' => 'Includes quads, hamstrings, calves, and glutes, essential for movement and strength.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Core',
                'description' => 'Abdominal and oblique muscles, important for stability and posture.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
