<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'), // secure hash
            'role' => 'admin',
        ]);

        // Regular user
        User::create([
            'name' => 'Normal User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123'), // secure hash
            'role' => 'user',
        ]);

        $faker = Faker::create();

        foreach (range(1, 20) as $i) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // default password
                'role' => $faker->randomElement(['admin', 'user']),
                'gender' => $faker->randomElement(['male', 'female']),
                'dob' => $faker->date(),
                'height' => $faker->randomFloat(2, 150, 200),
                'weight' => $faker->randomFloat(2, 50, 120),
                'goal' => $faker->randomElement(['lose_weight', 'build_muscle', 'improve_flexibility']),
            ]);
        }
    }
}
