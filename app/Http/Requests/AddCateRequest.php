<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCateRequest extends FormRequest
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
            'name'=>'unique:categories,cate_name'
        ];
    }

    public function message() {
        return [
            'name.unique'=>'Tên danh mục đã có trong trang web. Vui lòng chọn tên khác!'
        ];
    }
}
