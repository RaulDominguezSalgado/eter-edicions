<?php

namespace App\Http\Requests;

use App\Http\Actions\Validator;
use Illuminate\Foundation\Http\FormRequest;

class BookstoreRequest extends FormRequest
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
			'name' => ['required',Validator::$validations["name"]],
			'address' =>['required',Validator::$validations["address"]],
			'website' => ['required',Validator::$validations["url"]],
			'zip_code' => ['nullable',Validator::$validations["zip_code"]],
			'city' => ['required',Validator::$validations["name"]],
			'province' => ['required',Validator::$validations["name"]],
			'country' => ['nullable',Validator::$validations["name"]],
			'email' => ['nullable',Validator::$validations["email"]],
			'phone' => ['nullable',Validator::$validations["phone"]],
        ];
    }
}
