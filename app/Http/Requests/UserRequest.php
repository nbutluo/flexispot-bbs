<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,'.Auth::id(),
            'email' => 'required|email|unique:users,email,'.Auth::id(),
            'introduction' => 'max:80',
            // 'avatar' => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=208,min_height=208',
            // 'avatar' => 'mimes:jpeg,bmp,png,gif',
        ];
    }

    public function messages()
    {
        return [
            'avatar.mimes' => 'The avatar must be a picture in jpeg, bmp, png, gif format',
            'name.unique' => 'Username has been taken, please fill in again',
            'name.regex' => 'Usernames only support English, numbers, horizontal bars and underscores.',
            'name.between' => 'Username must be between 3-25 characters.。',
            'name.required' => 'Username can not be empty.',
            'email.unique' => 'The mailbox is already occupied, please check',
        ];
    }
}
