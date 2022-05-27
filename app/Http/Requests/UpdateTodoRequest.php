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
            'content' => 'required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'タスクを入力してください。',
            'content.max' => '20文字以内で入力してください。',
        ];
    }
}
