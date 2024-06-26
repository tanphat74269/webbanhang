<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class AddUserRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'email'=>'unique:web_users,email',
            'confirmpassword'=>'same:password',
        ];
    }

    public function messages() {
        return [
            'email.unique'=>'Email đã có trong trang web. Vui lòng chọn email khác!',
            'confirmpassword.same' => 'Mật khẩu nhập lại không trùng khớp'
        ];
    }
}
