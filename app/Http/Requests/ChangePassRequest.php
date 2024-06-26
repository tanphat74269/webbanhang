<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassRequest extends FormRequest
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
            'confirm_new_password'=>'same:new_password',
        ];
    }

    public function messages() {
        return [
            'confirm_new_password.same' => 'Mật khẩu nhập lại không trùng khớp'
        ];
    }
}
