<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryCourse extends Model
{
    protected $table = 'category_course';

    protected $fillable = [
        'course_id', 'category_id'
    ];
}
