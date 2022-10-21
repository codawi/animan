<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use App\Rules\CurrentPasswordRule;




class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //ユーザー名
            'name' => 'required',

            //メールアドレス
            'email' => [
                'required',
                'confirmed'
            ],

            //メールアドレス確認用
            'email_confirmation' => [
                'required',
                'same:email'
            ],

            //現在のパスワード
            'current_password' => [
                'required',
                Password::defaults(),
                new CurrentPasswordRule
            ],

            //新しいパスワード
            'new_password' => [
                'required',
                'confirmed', //確認用パスワードと同じか
                Password::defaults()
            ],

            //新しいパスワード確認用
            'new_password_confirmation' => [
                'required',
                Password::defaults(),
            ],
        ];
    }

    public function messages()
    {
        return[
            'new_password.confirmed' => '新しいパスワードが一致しません'
        ];
    }


}
