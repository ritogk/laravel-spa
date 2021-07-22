<?php

namespace App\Http\Requests\Admin\Master;

use Illuminate\Foundation\Http\FormRequest;

class JobCategoryListRequest extends FormRequest
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
            'filters_json' => ['required', 'string'],
            'fields.*' => ['required', 'string'],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes() {
        return [
            'filters.*' => '抽出値',
            'fields.*' => 'フィールド値',
        ];
    }
}
