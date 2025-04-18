<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Program;
use App\Models\Exercise;

class ExerciseProgramSeeder extends Seeder
{
    public function run()
    {
        // Get all exercises as name => id
        $exerciseIds = Exercise::pluck('id', 'name')->toArray();

        // Map program names to exercises with sets and reps
        $programExercises = [
            'Fat Loss Focus' => [
                ['name' => 'Burpees', 'sets' => 3, 'reps' => '15'],
                ['name' => 'Kettlebell Swings', 'sets' => 3, 'reps' => '20'],
                ['name' => 'Jump Squat', 'sets' => 3, 'reps' => '15'],
                ['name' => 'Bodyweight Squat', 'sets' => 3, 'reps' => '20'],
                ['name' => 'Knee Tuck Jumps', 'sets' => 3, 'reps' => '15'],
                ['name' => 'Push Ups', 'sets' => 3, 'reps' => '20'],
                ['name' => 'Medicine Ball Squat', 'sets' => 3, 'reps' => '15'],
            ],
            'Strength and Hypertrophy Focus' => [
                ['name' => 'Barbell Bench Press', 'sets' => 4, 'reps' => '6'],
                ['name' => 'Barbell Row', 'sets' => 4, 'reps' => '7'],
                ['name' => 'Dumbbell Shoulder Press', 'sets' => 4, 'reps' => '8'],
                ['name' => 'Barbell Deadlift', 'sets' => 4, 'reps' => '5'],
                ['name' => 'Dumbbell Step Up', 'sets' => 4, 'reps' => '10'],
                ['name' => 'T-Bar Rows', 'sets' => 4, 'reps' => '8'],
                ['name' => 'Dumbbell Bent-Over Row', 'sets' => 4, 'reps' => '8'],
            ],
            'Mobility Focus' => [
                ['name' => 'Plank', 'sets' => 5, 'reps' => '45 sec'],
                ['name' => 'Single Leg Glute Bridge', 'sets' => 5, 'reps' => '12'],
                ['name' => 'Side Lying Hip Raise', 'sets' => 5, 'reps' => '14'],
                ['name' => 'Bird Dog', 'sets' => 5, 'reps' => '12'],
                ['name' => 'Bodyweight Frog Pump', 'sets' => 5, 'reps' => '20'],
                ['name' => 'High Cable Rear Delt Fly', 'sets' => 5, 'reps' => '12'],
                ['name' => 'Bent-Over Lateral Raise', 'sets' => 5, 'reps' => '12'],
                ['name' => 'Barbell Front Raise', 'sets' => 5, 'reps' => '14'],
                ['name' => 'Seated Behind the Neck Barbell Shoulder Press', 'sets' => 5, 'reps' => '8'],
            ],
            'Core and Conditioning Focus' => [
                ['name' => 'Crunch Machine', 'sets' => 3, 'reps' => '15'],
                ['name' => 'Hanging Leg Raise', 'sets' => 3, 'reps' => '12'],
                ['name' => 'Plank Get Ups', 'sets' => 3, 'reps' => '12'],
                ['name' => 'Rope Ab Pulldown', 'sets' => 3, 'reps' => '13'],
                ['name' => 'Oblique Crunch', 'sets' => 3, 'reps' => '15'],
            ],
            'Upper Body Focus' => [
                ['name' => 'Dumbbell Shoulder Press', 'sets' => 4, 'reps' => '8'],
                ['name' => 'High Cable Rear Delt Fly', 'sets' => 4, 'reps' => '12'],
                ['name' => 'Bent-Over Lateral Raise', 'sets' => 4, 'reps' => '12'],
                ['name' => 'Barbell Front Raise', 'sets' => 4, 'reps' => '14'],
                ['name' => 'Seated Behind the Neck Barbell Shoulder Press', 'sets' => 4, 'reps' => '8'],
            ],
            'Full-Body Focus' => [
                ['name' => 'Barbell Deadlift', 'sets' => 4, 'reps' => '5'],
                ['name' => 'Barbell Bench Press', 'sets' => 4, 'reps' => '6'],
                ['name' => 'T-Bar Rows', 'sets' => 4, 'reps' => '8'],
                ['name' => 'Dumbbell Shoulder Press', 'sets' => 4, 'reps' => '8'],
                ['name' => 'Dumbbell Bent-Over Row', 'sets' => 4, 'reps' => '8'],
            ],
            'High Intensity' => [
                ['name' => 'Push Ups', 'sets' => 3, 'reps' => '20'],
                ['name' => 'Jump Squat', 'sets' => 3, 'reps' => '15'],
                ['name' => 'Medicine Ball Squat', 'sets' => 3, 'reps' => '15'],
                ['name' => 'Burpees', 'sets' => 3, 'reps' => '15'],
                ['name' => 'Knee Tuck Jumps', 'sets' => 3, 'reps' => '15'],
            ],
        ];

        // Insert pivot entries
        foreach ($programExercises as $programName => $exerciseEntries) {
            $program = Program::where('name', $programName)->first();

            if ($program) {
                foreach ($exerciseEntries as $entry) {
                    $exerciseId = $exerciseIds[$entry['name']] ?? null;
                    if ($exerciseId) {
                        DB::table('exercise_programs')->insert([
                            'program_id' => $program->id,
                            'exercise_id' => $exerciseId,
                            'sets' => $entry['sets'],
                            'reps' => $entry['reps'],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }
    }
}