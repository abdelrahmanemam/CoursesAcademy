<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(10),
        'description' => $faker->realText(rand(80, 600)),
        'rating' => rand(1,5),
        'views' => rand(11,900),
        'hours' => rand(30,120),
        'image_id' => function () {
            // Get random image id
            return App\Models\Image::inRandomOrder()->first()->id;
        },
        'level_id' => function () {
            // Get random level id
            return App\Models\Level::inRandomOrder()->first()->id;
        },
        'status' => 1
        ];
});
