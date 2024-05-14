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
            'phone_number' => 'required|numeric|min:9', // + y espacios


            'dni' => 'required|string',

            // Adress data
            'address' => 'required|string',
            'apartment' => 'nullable|string',
            'zip_code' => 'required|numeric|min:5',
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
