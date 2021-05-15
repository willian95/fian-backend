<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyCodeRequest extends FormRequest
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
            "phoneNumber" => "required|max:12",
            "code" => "required"
        ];
    }
    public function messages()
    {
        return [
            "phoneNumber.required" => "Número telefónico es requerido",
            "phoneNumber.max" => "Número telefónico debe tener menos de 12 caracterres",
            "code.required" => "Código es requerido"
        ];
    }
}
