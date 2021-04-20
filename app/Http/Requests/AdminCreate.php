<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminCreate extends FormRequest
{

    public function rules()
    {
        return [
            'username'  => ['required' ,
                Rule::unique('admins')->ignore(request()->username)
            ],
            'password'  => 'confirmed',
        ];
    }
}
