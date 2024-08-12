<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'name' => 'required',
            'lastname' => 'required',
            'dni' => 'required|unique:users,dni,' . $this->user->id,
            'email' => 'required',
            'confirm_password' => 'same:password',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Los nombres es obligatorio',
            'lastname.required' => 'Los apellidos es obligatorio',
            'dni.required' => 'La cédula de identidad es obligatoria',
            'email.required' => 'El correo electrónico es obligatorio',
            'confirm_password.same' => 'Las contraseñas no coinciden',
        ];
    }
}
