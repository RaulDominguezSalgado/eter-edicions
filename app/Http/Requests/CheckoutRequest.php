<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            // User data
            'first_name' => 'required|regex:/^[a-zA-Z\s]+$/|string',
            'last_name' => 'required|regex:/^[a-zA-Z\s]+$/|string',
            'email' => 'required|email',
            //'phone_number' => 'required|numeric|digits:9', // + y espacios
            'phone_number' => 'required|regex:/^[\d\s\+\-]{9,}$/',//regex:/^[\d\s\+\-]{9,}$/ especifica que el campo puede contener dígitos, espacios, y los símbolos '+' y '-' con un mínimo de 9 caracteres.
            'dni' => 'required|string',

            // Adress data
            'address' => 'required|string',
            'apartment' => 'nullable|string',
            'zip_code' => 'required|numeric|digits:5',
            'locality' => 'required|string',
            'province' => 'nullable|string',
            'country' => 'required|string',

            // Products data
            'products' => 'required',
            // 'shipment_taxes' => 'required',
            'quantities' => 'required',
            'prices' => 'required',
            'total' => 'required',
            'reference'=>'',
            // Order options
        ];
    }
}
