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
            // Order data
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required|numeric',
            'address' => 'required|string',
            'zip_code' => 'required|numeric',
            'population' => 'required|string',
            'province' => 'required|string',
            'country' => 'required|string',

            // Products data
            'products' => 'required',
            'quantities' => 'required',

            // Order options
            'shipment_method' => 'required',
            'payment_method' => 'required',
        ];
    }
}
