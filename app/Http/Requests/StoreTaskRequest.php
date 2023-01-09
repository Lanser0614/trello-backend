<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'category_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'order' => ['required', 'integer']
        ];
    }
}
