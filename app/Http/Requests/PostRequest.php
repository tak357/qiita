<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'tags' => 'string',
            'article' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してください（最大255文字）。',
            'title.max' => 'タイトルは最大255文字で入力してください。',
            'tags.stirng' => 'タグは文字列で入力してください。',
            'article.required' => '本文を入力してください。',
            'article.stirng' => '本文は文字列で入力してください。',
        ];
    }
}
