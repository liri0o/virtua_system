<?php

namespace App\Http\Requests\Admin\Empresarios;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
                'empresa_id' => 'required|exists:empresas,id',       
                'cargo' => 'required|min:5',
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
            'cedula.required' => 'La cédula es obligatorio',            
            'email.required' => 'El correo electrónico es obligatorio',
            'edad.required' => 'La edad es obligatoria',
            'tlf.required' => 'El número telefónico es obligatorio',
            'empresa_id.required' => 'La empresa es obligatoria',
            'cargo.required' => 'El cargo es obligatorio',
            'direccion.required' => 'La direccion es obligatoria',
            'password.required' => 'La contraseña es obligatoria',
            'confirm_password.required' => 'La confirmación de contraseña es obligatoria',
            'confirm_password.same' => 'Las contraseñas no coinciden',
        ];
    }
}
/* nombres
apellidos
cedula
edad
email
empresa_id
cargo
direccion
password
confirm_password */