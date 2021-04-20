<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CategoryCourse;
use Faker\Generator as Faker;

$factory->define(CategoryCourse::class, function (Faker $faker) {
    return [
        'category_id' => function () {
            return App\Models\Category::inRandomOrder()->first()->id;
        },
        'course_id' => function () {
            return App\Models\Course::inRandomOrder()->first()->id;
        },
    ];
});
