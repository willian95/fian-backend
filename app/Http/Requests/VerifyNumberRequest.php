<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyNumberRequest extends FormRequest
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
            "phoneNumber" => "required|string|max:10"
        ];
    }
    public function messages()
    {
        return [
            "phoneNumber.required" => "Número telefónico es requerido",
            "phoneNumber.max" => "Número telefónico debe tener menos de 12 caracterres"
        ];
    }
}
