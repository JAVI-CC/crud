<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'Nombre' => 'required|min: 3',
            'Precio' => 'required|regex:/^[0-9]{1,}[.]{1}[0-9]{1}$/',
            'Unidades' => 'required|min: 1|regex:/^[0-9]/',
        ];
    }
}
