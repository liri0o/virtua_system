<?php

namespace App\Http\Requests\Admin\Estudiantes;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteStore extends FormRequest
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
            'cedula' => 'required|unique:users,dni',
            'email' => 'required|unique:users,email',
            'edad' => 'required',
            'tlf' => 'required|unique:empresarios,tlf',
            'carrera_id' => 'required|exists:carreras,id',            
            'direccion' => 'required|min:5',
            'password' => 'required|min:5|max:12',
            'confirm_password' => 'required|same:password',
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
            'carrera_id.required' => 'La carrera es obligatoria',            
            'direccion.required' => 'La direccion es obligatoria',
            'password.required' => 'La contraseña es obligatoria',
            'confirm_password.required' => 'La confirmación de contraseña es obligatoria',
            'confirm_password.same' => 'Las contraseñas no coinciden',
        ];
    }
}
