<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'first_name' => 'required|regex:/^[a-zA-Z]+$/|string', //permite caracteres alfabéticos entre mayúsculas y minúsculas
                'last_name' => 'required|regex:/^[a-zA-Z]+$/|string',
                'email' => 'required|email|unique:users,email', // El campo "email" es obligatorio y debe ser único en la tabla "users"
                'password' => 'required',
                'phone' => 'required|digits:9', //digits:9 onliga que sea numero y logitud 9
                'role_id' => 'required',
            ];
        } else {
            return [
                'first_name' => 'required|regex:/^[a-zA-Z]+$/|string',
                'last_name' => 'required|regex:/^[a-zA-Z]+$/|string',
                'email' => 'required|email',
                'password' => 'required', //implement requirements
                'phone' => 'required|digits:9',
                'role_id' => 'required',
            ];
        }
    }
}
