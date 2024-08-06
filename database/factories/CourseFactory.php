<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(4),
        'description' => $faker->paragraph(),
        'about' => $faker->paragraph(),
        'subject' => $faker->words(1),
        'experience' => $faker->words(1),
        'level' => $faker->words(1),
        'price' => $faker->numberBetween($min = 100, $max = 300),
        'teacher' => $faker->name(),
        'image' => $faker->image(),
        'video' => $faker->image(),
        'focus' => $faker->paragraph(),
        'day' => $faker->dayOfWeek(),
        'weekly_lessons' => $faker->numberBetween($min = 1, $max = 3),
        'total_lessons' => $faker->numberBetween($min = 1, $max = 3),
        'lesson_hours' => $faker->numberBetween($min = 2, $max = 6),
        'weekly_hours' => $faker->numberBetween($min = 2, $max = 6),
        'total_hours' => $faker->numberBetween($min = 2, $max = 6),
        'total_weeks' => $faker->numberBetween($min = 2, $max = 6),
        'audience' => $faker->paragraph(),
        'max_size' => $faker->numberBetween($min = 4, $max = 10),
        'time' => $faker->time,
        'start_date' => $faker->date,
        'end_date' => $faker->date,
    ];
});
