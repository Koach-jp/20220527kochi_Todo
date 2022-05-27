<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTodoRequest extends FormRequest
{
    public function authorize()
    {
        if ($this->path()=='todo/update') {
            return true;
        } else {
            return false;
        }
    }

    public function rules()
    {
        return [
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'タスクを入力してください。',
        ];
    }
}
