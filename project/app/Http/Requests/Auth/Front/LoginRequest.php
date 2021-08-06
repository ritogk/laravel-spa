<?php

namespace App\Http\Requests\Auth\Front;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
            'remember' => ['required', 'boolean'],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes() {
        return [
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'remember' => 'ログイン状態を保存',
        ];
    }
}
