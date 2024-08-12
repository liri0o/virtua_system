<?php

namespace App\Http\Requests\Admin\Tutores;

use Illuminate\Foundation\Http\FormRequest;

class TutorUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombres' => 'required|min:0',
            'apellidos' => 'required|min:0',
            'cedula' => 'required|unique:users,dni,' . $this->tutor->user->id,
            'email' => 'required|unique:users,email,'. $this->tutor->user->id,
            'edad' => 'required',
            'tlf' => 'required|unique:tutors,tlf,' . $this->tutor->id,
            'carrera_id' => 'required|exists:carreras,id',            
            'direccion' => 'required|min:5',
            'profesion' => 'required|min:5',
            'password' => 'min:0|max:12',
            'confirm_password' => 'same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'nombres.required' => 'Los nombres son obligatorios',
            'apellidos.required' => 'Los apellidos son obligatorios',
            'cedula.required' => 'La cédula es obligatoria',
            'email.required' => 'El correo electrónico es obligatorio',
            'edad.required' => 'La edad es obligatoria',
            'tlf.required' => 'El número telefónico es obligatorio',
            'profesion.required' => 'La profesion es obligatoria',
            'carrera_id.required' => 'La carrera es obligatoria',            
            'direccion.required' => 'La direccion es obligatoria',                                 
            'confirm_password.same' => 'Las contraseñas no coinciden',
        ];
    }
}

