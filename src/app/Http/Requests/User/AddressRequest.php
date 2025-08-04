<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
        // ProfileRequestのルールを取得
        $profileRequest = new \App\Http\Requests\User\ProfileRequest();
        $profileRules = $profileRequest->rules();

        // AddressRequestのルール
        $addressRules = [
            'user-name' => 'required',
            'post-code' => 'required|regex:/^\d{3}-\d{4}$/',
            'address' => 'required',
            'building' => 'required',
        ];

        // 両方のルールをマージ
        return array_merge($profileRules, $addressRules);
    }

    public function messages()
    {
        // ProfileRequestのメッセージを取得
        $profileRequest = new \App\Http\Requests\User\ProfileRequest();
        $profileMessages = $profileRequest->messages();

        // AddressRequestのメッセージ
        $addressMessages = [
            'user-name.required' => 'ユーザ名を入力してください',
            'post-code.required' => '郵便番号を入力してください',
            'post-code.regex' => '郵便番号はXXX-XXXXの形式で入力してください',
            'address.required' => '住所を入力してください',
            'building.required' => '建物名を入力してください',
        ];

        // 両方のメッセージをマージ
        return array_merge($profileMessages, $addressMessages);
    }
}
