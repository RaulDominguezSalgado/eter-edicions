<?php

namespace App\Http\Requests;

use App\Http\Actions\Validator;
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
                'first_name' => ['required',Validator::$validations["first_name"]],
                'last_name' =>  ['required',Validator::$validations["last_name"]],
                'email' => ['required',Validator::$validations["email"]],
                'password' =>  ['nullable',Validator::$validations["strict_password"]],
                'phone' => ['nullable',Validator::$validations["phone"]],
                'role_id' => 'required',
            ];
        } else {
            return [
                'first_name' => ['required',Validator::$validations["first_name"]],
                'last_name' =>  ['required',Validator::$validations["last_name"]],
                'email' => ['required',Validator::$validations["email"]],
                'phone' => ['nullable',Validator::$validations["phone"]],
                'password' =>  ['nullable',Validator::$validations["strict_password"]],                'phone' => ['nullable',Validator::$validations["phone"]],
                'role_id' => 'required',
            ];
        }
    }
}
