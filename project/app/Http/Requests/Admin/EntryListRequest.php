<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EntryListRequest extends FormRequest
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
            'title' => 'nullable',
            'job_category_id' => 'nullable',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes() {
        return [
            'title' => 'タイトル',
            'job_category_id' => '仕事カテゴリ',
        ];
    }

    /**
     * 抽出条件
     *
     * @return array
     */
    public function filters(): array{
        $filters = [];
        if(isset($this->title)) {
            $filters[] = ['title', 'LIKE', '%'. $this->title. '%'];
        }
        if(isset($this->job_category_id)) {
            $filters[] = ['job_category_id', '=', $this->job_category_id];
        }
        return $filters;
    }
}
