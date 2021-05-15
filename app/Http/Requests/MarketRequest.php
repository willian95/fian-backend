<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketRequest extends FormRequest
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
            "selectedDepartment" => "required|exists:departments,id",
            "district" => "required",
            "name" => "required",
            "address" => "required",
            "schedule" => "required"
        ];
    }

    public function messages()
    {
        return [
            "selectedDepartment.required" => "Debe seleccionar un departamento",
            "selectedDepartment.exists" => "Departamento seleccionado no es válido",
            "district.required" => "Debe agregar un municipio",
            "name.required" => "Debe agregar un nombre",
            "address.required" => "Debe añadir una dirección",
            "schedule.required" => "Debe agregar un horario"
        ];
    }
}
