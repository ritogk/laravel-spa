<?php

namespace App\Http\Requests\Admin\Master;

use Illuminate\Foundation\Http\FormRequest;

class GeneralListRequest extends FormRequest
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
            'kbn' => 'nullable',
            'value' => 'nullable',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes() {
        return [
            'kbn' => '区分',
            'value' => '値',
        ];
    }

    /**
     * 抽出条件
     *
     * @return array
     */
    public function filters(): array{
        $filters = [];
        if(isset($this->kbn)) {
            $filters[] = ['kbn', 'LIKE', '%'. $this->kbn. '%'];
        }
        if(isset($this->value)) {
            $filters[] = ['value', 'LIKE', '%'. $this->value. '%'];
        }
        return $filters;
    }
}
