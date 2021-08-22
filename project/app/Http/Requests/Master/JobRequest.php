<?php

namespace App\Http\Requests\Master;

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
            'id' => 'nullable',
            'title' => 'required|max:50',
            'content' => 'required|max:1000',
            'attention' => 'required|integer|min:0|max:1',
            'job_category_id' => 'required|numeric',
            'price' => 'required|numeric',
            'welfare' => 'nullable|max:1000',
            'holiday' => 'nullable|max:1000',
            'image' => 'required',
            'sort_no' => 'required|numeric|digits_between:1,9',
            'updated_at' => 'date|nullable',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes() {
        return [
            'id' => 'id',
            'title' => 'タイトル',
            'content' => '内容',
            'attention' => '注目',
            'job_category_id' => 'カテゴリ',
            'price' => '金額',
            'welfare' => '福利厚生',
            'holiday' => '休日',
            'image' => '画像',
            'sort_no' => '並び順',
            'updated_at' => '更新日時',
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
            'status' => 422,
            'errors' => $validator->errors(),
        ], 422);
        throw new HttpResponseException($response);
    }
}
