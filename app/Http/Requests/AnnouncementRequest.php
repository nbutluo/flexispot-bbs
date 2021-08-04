<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'content' => 'required|min:2',
            'link' => 'required|url',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => '标题不能为空',
            'content.min' => '标题字数不能少于2个',
            'link.required' => '链接地址不能为空',
            'link.url' => '请输入合法的 URl 链接',
        ];
    }
}
