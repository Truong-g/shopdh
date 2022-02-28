<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
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
            'name' => 'required|unique:suppliers',
            'siteurl' => 'required',
            'logo' => 'mimes:png,jpg,gif|max:2408',
            'fullname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'metakey' => 'required',
            'metadesc' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'name.min' => 'Tên danh mục ít nhất 2 ký tự',
            'metakey.required' => 'Từ khóa không được để trống',
            'metadesc.required' => 'Mô tả không được để trống',

        ];
    }
}
