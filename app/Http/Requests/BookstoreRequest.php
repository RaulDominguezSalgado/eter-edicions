<?php

namespace App\Http\Requests;

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
			'name' => 'required|string',
			'address' => 'required|string',
			'website' => 'required|string',
			'zip_code' => '',
			'city' => '',
			'province' => '',
			'country' => '',
			'email' => '',
			'phone' => '',
        ];
    }
}
