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
        $id = $this->route('category') ? $this->route('category')->id : false;

        return [
            'name' => 'required|min:2|unique:categories,name,' . $id,
        ];
    }

    public function messages()
    {
        return [
            'name.min' => '分类名称不能少于2个字',
            'name.required' => '分类名称不能为空',
            'name.unique' => '与已有分类名称重复',
        ];
    }
}
