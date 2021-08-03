<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2',
            'description' => 'required|min:2',
        ];
    }

    public function messages()
    {
        return [
            'name.min' => '分类名称不能少于2个字',
            'name.required' => '分类名称不能为空',
            'description.required' => '描述不能为空',
        ];
    }
}
