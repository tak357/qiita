<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'photo' =>
            'required|file|image|mimes:jpeg,png,jpg,gif,max2048',
        ];
    }

    public function messages()
    {
        return [
            'image' => '画像ファイルを選択してください。',
            'mimes' => 'ファイル形式はjpeg,jpg,png,gifで最大2MBまでアップロード可能です。',
        ];
    }
}
