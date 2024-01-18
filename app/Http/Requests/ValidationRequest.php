<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationRequest extends FormRequest
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
           
            // 'first_name'=>'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
            // 'birthday'  => 'required|date|date_format:Y-m-d',
            // 'date_hired'  => 'required|date|date_format:Y-m-d',
            // 'mobile_number' => 'required|min:11|numeric',
            // 'tin' => 'min:9|numeric',
            // 'sss' => 'required|min:10|numeric',
            // 'pagibig_number' => 'required|min:12|numeric',
            
        ];
       
    }
}
