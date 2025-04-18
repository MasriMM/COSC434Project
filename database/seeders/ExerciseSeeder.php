<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseSeeder extends Seeder
{
    public function run()
    {
        DB::table('exercises')->insert([
[
        'name' => 'Burpees',
        'description' => 'A full-body exercise that involves a squat, jump, and push-up, effectively boosting metabolism and burning calories.',
        'img' => 'imgs/exercises/Burpees.webp',
        'difficulty' => 'hard',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Kettlebell Swings',
        'description' => 'Swinging the kettlebell from between the legs to shoulder height helps build lower body strength while improving endurance.',
        'img' => null,
        'difficulty' => 'intermediate',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Jump Squat',
        'description' => 'An explosive version of the bodyweight squat, adding a jump to engage more muscle fibers and increase calorie burn.',
        'img' => 'imgs/exercises/Jump-Squat.webp',
        'difficulty' => 'intermediate',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Bodyweight Squat',
        'description' => 'A simple, yet effective lower body exercise that targets the legs and glutes with no equipment needed.',
        'img' => 'imgs/exercises/Bodyweight-Squat.webp',
        'difficulty' => 'easy',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Knee Tuck Jumps',
        'description' => 'A plyometric move where you jump and tuck your knees to your chest, improving explosive power and burning fat.',
        'img' => 'imgs/exercises/Knee-Tuck-Jumps.webp',
        'difficulty' => 'hard',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Barbell Bench Press',
        'description' => 'A foundational upper body strength exercise that targets the chest, shoulders, and triceps.',
        'img' => 'imgs/exercises/Barbell-Bench-Press.webp',
        'difficulty' => 'hard',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Barbell Row',
        'description' => 'A compound pulling movement that engages the back and biceps, helping to build thickness and strength in the back.',
        'img' => 'imgs/exercises/Barbell-Row.webp',
        'difficulty' => 'hard',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Dumbbell Shoulder Press',
        'description' => 'A pressing movement to build shoulder strength and size, with the added benefit of engaging the triceps.',
        'img' => 'imgs/exercises/Dumbbell-Shoulder-Press.webp',
        'difficulty' => 'intermediate',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Barbell Deadlift',
        'description' => 'A powerful compound lift that targets the posterior chain, including the hamstrings, glutes, and lower back.',
        'img' => 'imgs/exercises/Barbell-Deadlift.webp',
        'difficulty' => 'hard',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Dumbbell Step Up',
        'description' => 'A unilateral movement that targets the quads and glutes, helping to develop leg strength and stability.',
        'img' => 'imgs/exercises/Dumbbell-Step-Up.webp',
        'difficulty' => 'intermediate',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Plank',
        'description' => 'A static hold that strengthens the core while also engaging the shoulders, arms, and back.',
        'img' => null,
        'difficulty' => 'intermediate',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Single Leg Glute Bridge',
        'description' => 'A bridge variation where one leg is elevated, providing a deeper stretch and strengthening the glutes and hamstrings.',
        'img' => 'imgs/exercises/Single-Leg-Glute-Bridge.webp',
        'difficulty' => 'easy',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Side Lying Hip Raise',
        'description' => 'A mobility exercise that helps stretch and activate the hip muscles while engaging the obliques.',
        'img' => 'imgs/exercises/Side-Lying-Hip-Raise.webp',
        'difficulty' => 'easy',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Bird Dog',
        'description' => 'A balance and flexibility exercise that works the core, lower back, and shoulders while promoting stability.',
        'img' => 'imgs/exercises/Bird-Dog.webp',
        'difficulty' => 'intermediate',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Bodyweight Frog Pump',
        'description' => 'A hip thrust variation that stretches the inner thighs and glutes while engaging the core for stability.',
        'img' => 'imgs/exercises/Bodyweight-Frog-Pump.webp',
        'difficulty' => 'easy',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Crunch Machine',
        'description' => 'A machine-based exercise that isolates the abdominal muscles for a controlled crunch movement.',
        'img' => null,
        'difficulty' => 'intermediate',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Hanging Leg Raise',
        'description' => 'An abdominal exercise where the legs are raised while hanging, targeting the lower abs and improving core stability.',
        'img' => 'imgs/exercises/Hanging-Leg-Raise.webp',
        'difficulty' => 'hard',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Plank Get Ups',
        'description' => 'A dynamic version of the plank where you alternate between plank and push-up position, strengthening the core and shoulders.',
        'img' => 'imgs/exercises/plank-get-ups.svg',
        'difficulty' => 'hard',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Rope Ab Pulldown',
        'description' => 'A cable-based exercise that targets the abdominal muscles and obliques while improving overall trunk strength.',
        'img' => 'imgs/exercises/Rope-Ab-Pulldown.webp',
        'difficulty' => 'intermediate',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Oblique Crunch',
        'description' => 'A twisting crunch that focuses on the obliques, helping to define the sides of the core.',
        'img' => 'imgs/exercises/Oblique-Crunch.webp',
        'difficulty' => 'intermediate',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'T-Bar Rows',
        'description' => 'A rowing movement that targets the upper back, improving thickness and strength in the back muscles.',
        'img' => null,
        'difficulty' => 'intermediate',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Dumbbell Bent-Over Row',
        'description' => 'A row variation that targets the back and biceps, promoting back thickness and strength.',
        'img' => null,
        'difficulty' => 'intermediate',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'High Cable Rear Delt Fly',
        'description' => 'A cable movement that targets the rear delts and upper back, promoting shoulder mobility and flexibility.',
        'img' => 'imgs/exercises/High-Cable-Rear-Delt-Fly.webp',
        'difficulty' => 'easy',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Bent-Over Lateral Raise',
        'description' => 'A shoulder exercise that focuses on the rear delts, helping to improve posture and shoulder flexibility.',
        'img' => null,
        'difficulty' => 'easy',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Barbell Front Raise',
        'description' => 'A front-delt-focused exercise that stretches the shoulders and improves shoulder flexibility.',
        'img' => 'imgs/exercises/Barbell-Front-Raise.webp',
        'difficulty' => 'intermediate',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Seated Behind the Neck Barbell Shoulder Press',
        'description' => 'A pressing movement that helps improve shoulder mobility and strengthens the deltoids and triceps.',
        'img' => 'imgs/exercises/Seated-Behind-the-Neck-Barbell-Shoulder-Press.webp',
        'difficulty' => 'intermediate',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Push Ups',
        'description' => 'A bodyweight exercise that targets the chest, shoulders, and triceps while engaging the core.',
        'img' => 'imgs/exercises/Push-Ups.webp',
        'difficulty' => 'intermediate',
        'created_at' => now(),
        'updated_at' => now()
    ],
[
        'name' => 'Medicine Ball Squat',
        'description' => 'A squat variation that incorporates a medicine ball for added intensity, targeting the legs and glutes.',
        'img' => 'imgs/exercises/Medicine-Ball-Squat.webp',
        'difficulty' => 'intermediate',
        'created_at' => now(),
        'updated_at' => now()
    ]
        ]);
    }
}