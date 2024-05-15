<?php

namespace App\Http\Requests;
use App\Rules\Dni;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
                'date' => 'required',
                'total' => '',
                'shipment_taxes' => '',
                'reference' => 'required',
                'dni' => ['required', 'min:9', new Dni],//dni valido: 12345678Z, nie valido: 
                'first_name' => 'required|regex:/^[a-zA-Z\s]+$/|string', //'required|regex:/^[a-zA-Z]+$/|string',permite caracteres alfabéticos entre mayúsculas y minúsculas, espacios
                'last_name' => 'required|regex:/^[a-zA-Z\s]+$/|string',//espacios
                'email' => 'required',
                'phone_number' => 'required|digits:9',
                'address' => 'required',
                'zip_code' => 'required|digits:5',
                'city' => 'required|regex:/^[a-zA-Z]+$/|string',
                'country' => 'required|regex:/^[a-zA-Z]+$/|string',
                'payment_method' => 'required',
                'status_id' => 'required',
                'pdf' => 'required|file|mimes:pdf',
                'products' => 'required|array',
                'products.*' => 'array:id,quantity,pvp',
                'tracking_id' => 'required|regex:/^[a-zA-Z0-9-]+$/',
            ];
        } else {
            return [
                'date' => 'required',
                'total' => '',
                'reference' => 'required|regex:/^[a-zA-Z0-9]+$/',
                'dni' => 'required',
                'first_name' => 'required|regex:/^[a-zA-Z]+$/|string',
                'last_name' => 'required|regex:/^[a-zA-Z]+$/|string',
                'email' => 'required',
                'phone_number' => 'required|digits:9',
                'address' => 'required',
                'zip_code' => 'required|digits:5',
                'city' => 'required',
                'country' => 'required',
                'payment_method' => 'required',
                'status_id' => 'required',
                'pdf' => '',
                'products' => 'required|array',
                'products.*' => 'array:id,quantity,pvp',
                'tracking_id' => 'required|regex:/^[a-zA-Z0-9-]+$/',
            ];
        }
    }


    //Las siguientes rules tiene validacion dni pero hay que testear
    // public function rules(): array
    // {
    //     if ($this->isMethod('post')) {
    //         return [
    //             'date' => 'required',
    //             'total' => '',
    //             'reference' => 'required|regex:/^[a-zA-Z0-9]+$/',
    //             'dni' => 'required|digits:8|regex:/^[0-9]{8}[A-Z]$/|callback:validateDNI',
    //             'first_name' => 'required|regex:/^[a-zA-Z]+$/|string',
    //             'last_name' => 'required|regex:/^[a-zA-Z]+$/|string',
    //             'email' => 'required',
    //             'phone_number' => 'required|digits:9',
    //             'address' => 'required',
    //             'zip_code' => 'required|digits:5',
    //             'city' => 'required|regex:/^[a-zA-Z]+$/|string',
    //             'country' => 'required|regex:/^[a-zA-Z]+$/|string',
    //             'payment_method' => 'required',
    //             'status_id' => 'required',
    //             'pdf' => 'required|file|mimes:pdf',
    //             'products' => 'required|array',
    //             'products.*' => 'array:id,quantity,pvp',
    //             'tracking_id' => 'required|regex:/^[a-zA-Z0-9-]+$/',
    //         ];
    //     } else {
    //         return [
    //             'date' => 'required',
    //             'total' => '',
    //             'reference' => 'required|regex:/^[a-zA-Z0-9]+$/',
    //             'dni' => 'required|digits:8|regex:/^[0-9]{8}[A-Z]$/|callback:validateDNI',
    //             'first_name' => 'required|regex:/^[a-zA-Z]+$/|string',
    //             'last_name' => 'required|regex:/^[a-zA-Z]+$/|string',
    //             'email' => 'required',
    //             'phone_number' => 'required|digits:9',
    //             'address' => 'required',
    //             'zip_code' => 'required|digits:5',
    //             'city' => 'required',
    //             'country' => 'required',
    //             'payment_method' => 'required',
    //             'status_id' => 'required',
    //             'pdf' => '',
    //             'products' => 'required|array',
    //             'products.*' => 'array:id,quantity,pvp',
    //             'tracking_id' => 'required|regex:/^[a-zA-Z0-9-]+$/',
    //         ];
    //     }
    // }

    // public function validateDNI($value)
    // {
    //     $dni = substr($value, 0, 8);
    //     $letter = substr($value, 8, 1);
    //     $letters = 'TRWAGMYFPDXBNJZSQVHLCKE';
    //     $index = (int)$dni % 23;
    //     $correctLetter = $letters[$index];

    //     return $letter == $correctLetter;
    // }
}
