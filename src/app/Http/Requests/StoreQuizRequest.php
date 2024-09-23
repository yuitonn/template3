<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuizRequest extends FormRequest
{
    public function authorize()
    {
        return true; // 認可の設定（適切に設定してください）
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:100', // バリデーションルール
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'タイトルは必須項目です。',
            'name.string' => 'タイトルは文字列でなければなりません。',
            'name.max' => 'タイトルは100文字以内でなければなりません。',
        ];
    }
}