<?php

namespace App\Http\Requests;

class UserRequest extends FormRequest
{
    public function rules()
    {
        $uid =  $this->route('user');
        return [
            'account'=>'required|unique:users,account'.empty($uid)?'':','.$uid,
            'password'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'account.required'=>'账号必须填写',
            'account.unique'=>'账号已经存在',
            'password.required'=>'密码必须填写'
        ];
    }
}
