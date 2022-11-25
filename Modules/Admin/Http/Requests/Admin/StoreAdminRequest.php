<?php

namespace Modules\Admin\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:20',
            'username' => 'required|string|unique:admins|min:3|max:20',
            'mobile' => 'required|string|unique:admins|regex:/(^09\d{9}$)/u',
            'email' => 'email|unique:admins|min:3|max:255|nullable',
            'password' => 'required|string|confirmed|min:6',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'status' => $this->has('status')
        ]);
    }

    public function messages()
    {
        return [

            'name.required' => 'لطفا نام خود را وارد کنید',
            'name.string' => 'لطفا نام خود را بصورت صحیح وارد کنید',
            'name.min' => 'نام شما نمیتواند کمتر از ۳ کاراکتر باشد',
            'name.max' => 'نام شما نمیتواند بیشتر از ۲۰کاراکتر باشد',

            'username.required'=> 'لطفا نام کاربری خود را وارد کنید',
            'username.string'=> 'لطفا نام کاربری خود را بصورت صحیح وارد کنید',
            'username.unique'=> 'این نام کاربری قبلا استفاده شده است.لطفا از نام دیگری استفاده کنید.',
            'username.min'=> 'نام کاربری نمیتواند کمتر از ۳ کاراکتر باشد',
            'username.max'=> 'نام کاربری نمیتواند بیشتر از ۲۰کاراکتر باشد',

            'mobile.required' => 'لطفا شماره موبایل خود را وارد کنید',
            'mobile.unique' => 'این شماره قبلا استفاده شده است.لطفا از شماره دیگری استفاده کنید',
            'mobile.regex' => 'لطفا شماره موبایل را به فرمت صحیح وارد کنید',

            'email.email' => 'لطفا ایمیل را به فرمت صحیح وارد کنید',
            'email.unique' => 'این ایمیل قبلا استفاده شده است.لطفا از ایمیل دیگری استفاده کنید',
            'email.min' => ' ایمیل نمیتواند کمتر از ۲ کاراکتر باش',
            'email.max' => 'ایمیل نمیتواند بیشتر از ۲۵۵ کاراکتر باشد',

            'password.required' => 'لطفا رمز عبور خود را وارد کنید',
            'password.confirmed' => 'لطفا رمز عبور خود را مجددا وارد کنید',
            'password.min' => 'رمز عبور نباید کمتر از 6 حرف باشد',
        ];
    }
}
