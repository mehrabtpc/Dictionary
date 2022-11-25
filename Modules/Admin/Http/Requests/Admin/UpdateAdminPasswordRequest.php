<?php

namespace Modules\Admin\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdateAdminPasswordRequest extends FormRequest
{

    public function rules()
    {
        return [
            'password' => 'required|string|confirmed|min:6',
        ];
    }

    public function authorize()
    {
        return true;
    }


    public function messages()
    {
        return[
            'password.required' => 'لطفا رمز عبور خود را وارد کنید',
            'password.confirmed' => 'لطفا تکرار رمز عبور خود را وارد کنید',
            'password.min' => 'رمز عبور نباید کمتر از 6 حرف باشد',

        ];
    }
}
