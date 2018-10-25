<?php

namespace LaravelEnso\Companies\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'person_id' => 'required|exists:people,id',
            'position' => 'string|nullable',
        ];
    }
}
