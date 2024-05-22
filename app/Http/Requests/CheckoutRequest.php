<?php

namespace App\Http\Requests;

use App\Http\Actions\Validator;
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
            'first_name' => ['required', Validator::$validations["first_name"]],
            'last_name' => ['required', Validator::$validations["last_name"]],
            'email' => ['required', Validator::$validations["email"]],
            'phone_number' =>  ['required', Validator::$validations["phone"]],
            'dni' => 'required|string',
            'typeNIF' => 'required',
            // Adress data
            'address' =>  ['required', Validator::$validations["address"]],
            'apartment' => ['nullable', Validator::$validations["address_number"]],//discord error
            'zip_code' => ['required', Validator::$validations["zip_code"]],
            'locality' => ['required', Validator::$validations["address"]],
            'province' =>  ['nullable', Validator::$validations["address"]],//discord error
            'country' => ['required', Validator::$validations["address"]],

            // Products data
            'products' => 'required',
            // 'shipment_taxes' => 'required',
            'quantities' => 'required',
            'prices' => 'required',
            'total' => 'required',
            'reference' => '',
            // Order options
        ];
    }

    /**

     *Configure the validator instance.*
     *@param \Illuminate\Validation\Validator $validator
     *@return void*/
    public function withValidator(\Illuminate\Validation\Validator $validator)
    {
        $validator->after(function ($validator) {
            $type = $this->input('typeNIF');
            $dni = $this->input('dni');
            if ($type === 'DNI' && !Validator::isValidDni($dni)) {
                $validator->errors()->add('dni', 'El DNI no es válido.');
            } elseif ($type === 'NIE' && !Validator::isValidNie($dni)) {
                $validator->errors()->add('dni', 'El NIE no es válido.');
            } elseif ($type === 'CIF' && !Validator::isValidCif($dni)) {
                $validator->errors()->add('dni', 'El CIF no es válido.');
            }
        });
    }
}
