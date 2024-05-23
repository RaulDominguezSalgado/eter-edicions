<?php

namespace App\Http\Requests;

use App\Http\Actions\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'name' => ['required',Validator::$validations["first_name"]],
            'email' => ['required',Validator::$validations["email"]],
            'subject' => ['required',Validator::$validations["description"]],
            'message' => ['required',Validator::$validations["description"]],
        ];
    }
}
