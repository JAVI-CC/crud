<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntregaRequest extends FormRequest
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
            'Telefono' => 'required|min: 9|max: 9',
            'Fecha_inicio' => 'required|date',
            'Fecha_final' => 'required|date|after_or_equal:Fecha_inicio',
        ];
    }
}
