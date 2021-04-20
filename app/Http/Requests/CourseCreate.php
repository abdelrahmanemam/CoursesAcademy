<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseCreate extends FormRequest
{

    public function rules()
    {
        return [
            'name'          => 'required',
            'image'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id'   => 'numeric|required|min:1',
            'description'   => 'required',
            'level_id'      => 'required|numeric',
            'hours'         => 'required|numeric',
            'status'        => 'numeric|required',
        ];
    }
}
