<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreate extends FormRequest
{

    public function rules()
    {
        return [
            'name'      => 'required',
            'status'    => 'numeric|required',
        ];
    }
}
