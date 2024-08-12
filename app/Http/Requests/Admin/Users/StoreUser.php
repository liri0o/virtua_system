<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'name' => 'required|min:0',
            'lastname' => 'required|min:0',
            'dni' => 'required|unique:users,dni',           
            'email' => 'required|unique:users,email',
            'password' => 'required|min:5|max:12',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo  nombres es obligatorio',
            'lastname.required' => 'El campo apellidos es obligatorio',
            'dni.required' => 'El campo cédula es obligatorio',            
            'email.required' => 'El correo electrónico es obligatorio',
            'password.required' => 'La contraseña es obligatoria',
            'confirm_password.required' => 'La confirmación de contraseña es obligatoria',
            'confirm_password.same' => 'Las contraseñas no coinciden',
        ];
    }
}
