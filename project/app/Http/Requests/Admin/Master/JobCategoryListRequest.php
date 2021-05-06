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
            'name' => 'nullable',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes() {
        return [
            'name' => '名称',
        ];
    }

    /**
     * 抽出条件
     *
     * @return array
     */
    public function filters(): array{
        $filters = [];
        if(isset($this->name)) {
            $filters[] = ['name', 'LIKE', '%'. $this->name. '%'];
        }
        return $filters;
    }
}
