<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'text' => 'required|max:200',
            'supplement' => 'nullable|string',
            'image' => 'nullable|image',
            'choice1' => 'required|max:100',
            'choice2' => 'required|max:100',
            'choice3' => 'required|max:100',
            'correct_choice' => 'required|integer|between:1,3',
        ];
    }

    public function messages()
    {
        return [
            'text.required' => '設問のテキストは必須です。',
            'text.max' => '設問のテキストは200文字以内で入力してください。',
            'choice1.required' => '選択肢1は必須です。',
            'choice1.max' => '選択肢1は100文字以内で入力してください。',
            'choice2.required' => '選択肢2は必須です。',
            'choice2.max' => '選択肢2は100文字以内で入力してください。',
            'choice3.required' => '選択肢3は必須です。',
            'choice3.max' => '選択肢3は100文字以内で入力してください。',
            'correct_choice.required' => '正解の選択肢は必須です。',
            'correct_choice.between' => '正解の選択肢は1から3の数字で指定してください。',
        ];
    }
}