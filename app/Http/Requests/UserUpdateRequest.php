<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use App\Rules\CurrentPasswordRule;
use Illuminate\Support\Facades\Auth;




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

    private const GUEST_USER_ID = 5;

    public function rules()
    {
        //ゲストユーザー時はバリデーションをかけない
        if (Auth::id() === self::GUEST_USER_ID) {
            return;
        } else {
            return [
                //ユーザー名
                'name' => [
                    'required',
                    'string',
                    'max:15'
                ],

                //メールアドレス
                'email' => [
                    'required',
                    'confirmed',
                    'max:255'
                ],

                //メールアドレス確認用
                'email_confirmation' => [
                    'required',
                    'same:email',
                    'max:255'
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
    }

    public function messages()
    {
        return [
            'new_password.confirmed' => '新しいパスワードが一致しません'
        ];
    }
}
