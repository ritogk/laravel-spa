<?php

namespace App\Http\Requests\Admin\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EntryRequest extends FormRequest
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
            'job_id' => 'required',
            'full_name' => ['required', 'max:100'],
            'self_pr' => ['required', 'max:1000'],
            'email' => ['required', 'email', 'max:256'],
            'tel' => ['required', 'regex:/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/u'],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes() {
        return [
            'job_id' => '仕事id',
            'full_name' => '氏名',
            'self_pr' => '自己PR',
            'email' => 'メールアドレス',
            'tel' => '電話番号',
        ];
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
