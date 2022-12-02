<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'image' => 'required_without:id|mimes:jpg,jpeg,png',
            'name' => 'required|string|max:100',
        ];
    }
    public function messages(){

        return [
            'required'  => 'هذا الحقل مطلوب ',
            'max'  => 'هذا الحقل طويل',
            'name.string'  =>'الاسم لابد ان يكون حروف او حروف وارقام ',
            'image.required_without'  => 'الصوره مطلوبة',
        ];
    }
}
