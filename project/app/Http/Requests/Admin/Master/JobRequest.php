<?php

namespace App\Http\Requests\Admin\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\Job;

class JobRequest extends FormRequest
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
            'item.title' => 'required|max:50',
            'item.content' => 'required|max:1000',
            'item.attention' => 'required',
            'item.job_category_id' => 'required',
            'item.price' => 'required',
            'item.welfare' => 'nullable|max:1000',
            'item.holiday' => 'nullable|max:1000',
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
            'item.title' => 'タイトル',
            'item.content' => '内容',
            'item.attention' => '注目',
            'item.job_category_id' => 'カテゴリ',
            'item.price' => '金額',
            'item.welfare' => '福利厚生',
            'item.holiday' => '休日',
            'item.image' => '画像',
            'item.sort_no' => '並び順',
            'item.updated_at' => '更新日時',
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
            if(!empty($this->input('id'))
                    && Job::find($this->input('id'))->updated_at > $this->input('updated_at')){
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
