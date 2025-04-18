<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Exercise;
use App\Models\MuscleGroup;

class ExerciseMuscleGroupSeeder extends Seeder
{
    public function run()
    {
        // Get IDs
        $exerciseIds = Exercise::pluck('id', 'name')->toArray();
        $muscleGroupIds = MuscleGroup::pluck('id', 'name')->toArray();

        // Define links (you can expand these as needed)
        $links = [
            'Burpees' => ['Full Body'],
            'Push Ups' => ['Chest', 'Shoulders', 'Arms', 'Core'],
            'Plank' => ['Core', 'Shoulders'],
            'Jump Squat' => ['Legs'],
            'Kettlebell Swings' => ['Legs', 'Core'],
            'Barbell Bench Press' => ['Chest', 'Shoulders', 'Arms'],
            'Barbell Deadlift' => ['Back', 'Legs', 'Core'],
            'Dumbbell Shoulder Press' => ['Shoulders', 'Arms'],
            'Bird Dog' => ['Core', 'Back'],
            'Bodyweight Squat' => ['Legs'],
            'Barbell Row' => ['Back', 'Arms'],
            'Dumbbell Step Up' => ['Legs'],
            'Hanging Leg Raise' => ['Core'],
            'Crunch Machine' => ['Core'],
            'T-Bar Rows' => ['Back'],
            'Dumbbell Bent-Over Row' => ['Back', 'Arms'],
            'High Cable Rear Delt Fly' => ['Shoulders'],
            'Side Lying Hip Raise' => ['Glutes', 'Core'],
            'Oblique Crunch' => ['Core'],
            'Bodyweight Frog Pump' => ['Glutes'],
            'Seated Behind the Neck Barbell Shoulder Press' => ['Shoulders', 'Arms'],
            'Rope Ab Pulldown' => ['Core'],
            'Knee Tuck Jumps' => ['Legs', 'Core'],
            'Single Leg Glute Bridge' => ['Glutes', 'Legs'],
            'Bent-Over Lateral Raise' => ['Shoulders'],
            'Medicine Ball Squat' => ['Legs'],
            'Barbell Front Raise' => ['Shoulders'],
        ];

        // Insert pivot entries
        foreach ($links as $exercise => $muscleGroups) {
            $exerciseId = $exerciseIds[$exercise] ?? null;

            foreach ($muscleGroups as $muscleGroup) {
                $muscleGroupId = $muscleGroupIds[$muscleGroup] ?? null;

                if ($exerciseId && $muscleGroupId) {
                    DB::table('exercise_muscle_groups')->insert([
                        'exercise_id' => $exerciseId,
                        'muscle_group_id' => $muscleGroupId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
