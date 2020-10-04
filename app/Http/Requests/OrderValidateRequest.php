<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\JapaneseZip;
use App\Rules\Email;
use App\Rules\Kana;
use App\Rules\Tel;

class OrderValidateRequest extends FormRequest
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
        'name' => 'required',
        'name_kana' => ['required', new Kana],
        'zip' => ['required', new JapaneseZip],
        'pref' => 'required',
        'address1' => 'required',
        'tel' => ['required', new Tel],
        'email' => ['required', new Email],
        'email2' => ['required', 'same:email', new Email],
      ];

    }

    /**
     * エラーメッセージのカスタマイズ
     * @return array
     */
    public function messages()
    {
        return [];
    }
}
