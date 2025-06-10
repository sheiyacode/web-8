<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\User;

class CourseSeeder extends Seeder
{

public function run(): void
{
    $user = User::where('role', 'user')->first();

    if ($user) {
        Course::create([
            'title' => 'English for Beginners',
            'description' => 'Dasar-dasar bahasa Inggris dalam 12 minggu.',
            'image' => 'https://via.placeholder.com/150',
            'user_id' => $user->id,
        ]);

        Course::create([
            'title' => 'Grammar Mastery',
            'description' => 'Pelajari grammar secara lengkap dan bertahap.',
            'image' => 'https://via.placeholder.com/150',
            'user_id' => $user->id,
        ]);
    }
}

}
