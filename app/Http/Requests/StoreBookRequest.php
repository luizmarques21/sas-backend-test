<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => ['required'],
            'isbn' => ['numeric']
        ];
    }

}
