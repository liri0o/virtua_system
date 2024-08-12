<?php

namespace App\Http\Requests\Admin\Carreras;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarrera extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:0|unique:carreras,name,' . $this->carrera->id,
            'code' => 'required|min:0|numeric|unique:carreras,code,' . $this->carrera->id,
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre de la carrera es obligatorio',
            'name.unique' => 'El nombre de la carrera ya ha sido',
            'code.required' => 'El código de la carrera es obligatorio',            
            'code.unique' => 'El código de la carrera ya ha sido registrado',            
        ];
    }
}
