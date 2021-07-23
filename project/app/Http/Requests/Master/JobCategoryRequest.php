<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\JobCategory;

class JobCategoryRequest extends FormRequest
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
            'item.name' => 'required|max:25',
            'item.content' => 'required|max:1000',
            'item.image' => 'nullable',
            'item.sort_no' => 'required|integer|digits_between:1,9',
            'item.updated_at' => 'date|nullable',
            'image' => 'nullable',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes() {
        return [
            'item.name' => '名称',
            'item.content' => '内容',
            'item.image' => '画像',
            'item.sort_no' => '並び順',
            'item.updated_at' => '更新日',
            'image' => '画像',
        ];
    }

    /**
     * 特殊なバリデーションを行う場合はここに処理を記述する
     *
     * @return void
     */
    public function withValidator($validator) {
        /* ここにバリデーションを書く */
        $validator->after(function ($validator) {
            \Log::debug($this->input('*'));
            if(!empty($this->input('id'))
                    && JobCategory::find($this->input('id'))->updated_at > $this->input('updated_at')){
                $validator->errors()->add('updated_at', 'すでに変更されたデータの可能性があります。最新の状態で再度実行してください。');
            }
        });
    }

    /**
     * バリデーションエラー後の処理を変える場合はここに処理を記述する
     * デフォルトはリダイレクト
     *
     * @return array
     */
    protected function failedValidation(Validator $validator) {
        $response = response()->json([
            'status' => 400,
            'errors' => $validator->errors(),
        ], 400);
        throw new HttpResponseException($response);
    }
}
