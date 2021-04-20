<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','description','image_id','rating','views','level_id','hours','status'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
