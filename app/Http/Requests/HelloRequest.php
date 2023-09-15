<?php

namespace App\Http\Requests;

use App\Rules\Tel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class HelloRequest extends FormRequest
{
    // バリデーションエラー発生時のリダイレクト先
    // protected $redirect = '/hello';
    // protected $redirectRoute = 'hello.index';

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->path() === 'hello/create';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
          'name' => 'required|alpha_dash',
          'age' => 'nullable|integer|max:150|min:10',
          'contact' => 'required|in:email, tel',
          'email' => 'required_if:contact,email|email',
          'tel' => [
            'required_if:contact,tel',
            new Tel,
          ],
          'concent' => 'accepted',
          'gender' => 'required|in:men,women,other',
          'start' => 'date_format:Y-m-d\TH:i',
          'end' => 'date_format:Y-m-d\TH:i|after_or_equal:start',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => ':attributeは入力必須です。',
            '*.email' => 'メールアドレスの形式が間違っています。',
            'age.max' => ':attributeは最大:maxまでです。',
            'age.min' => ':attributeは最小:minまでです。',
            'gender.in' => '性別欄から選択してください。'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => '名前',
            'mail' => 'メールアドレス',
            'age' => '年齢',
            'concent' => '利用規約同意',
        ];
    }

    // public function after(): array
    // {
    //     return [
    //         function(Validator $validator) {
    //             $contact = $this->contact;

    //             switch($contact) {
    //                 case 'email':
    //                     if()
    //                 break;
    //                 case 'tel':
    //                     break;
    //             }
    //         }
    //     ];
    // }
}
