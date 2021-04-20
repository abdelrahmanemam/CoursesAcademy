<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(CategoryCourseSeeder::class);
    }
}
