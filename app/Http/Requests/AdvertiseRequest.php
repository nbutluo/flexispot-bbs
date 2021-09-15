<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertiseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:2|max:30',
            'link' => 'url|nullable',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '标题不能为空',
            'title.min' => '标题字数不能少于2个',
            'title.max' => '标题字数不能超过30个',
            'link.url' => '请输入正确的 URl 链接',
        ];
    }
}
