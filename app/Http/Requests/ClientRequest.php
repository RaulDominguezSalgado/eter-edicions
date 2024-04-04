<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
			'order_id' => 'required',
			'dni' => 'required|string',
			'name' => 'required|string',
			'last_name' => 'required|string',
			'email' => 'required|string',
			'phone_number' => 'required|string',
			'address' => 'required|string',
			'zip_code' => 'required|string',
			'city' => 'required|string',
			'country' => 'required|string',
        ];
    }
}
