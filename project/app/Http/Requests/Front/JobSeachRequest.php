<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class JobSeachRequest extends FormRequest
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
            'category' => 'nullable',
            'content' => 'nullable',
            'price' => 'nullable',
            'attention' => 'nullable',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes() {
        return [
            'category' => 'カテゴリ',
            'content' => '仕事内容',
            'price' => '金額',
            'attention' => '注目求人',
        ];
    }
}
