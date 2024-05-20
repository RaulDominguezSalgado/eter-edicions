<?php

namespace App\Http\Requests;

use App\Http\Actions\Validator;
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
                'date' => ['required',Validator::$validations["date"]],
                'total' => '',
                'shipment_taxes' => ['nulleable',Validator::$validations["decimal"]],
                'reference' => ['required',Validator::$validations["reference"]],
                'dni' => ['required',],
                'first_name' => ['required',Validator::$validations["first_name"]],
                'last_name' => ['required',Validator::$validations["last_name"]],
                'email' =>  ['required',Validator::$validations["email"]],
                'phone_number' =>  ['required',Validator::$validations["phone"]],
                'address' => ['required',Validator::$validations["address"]],
                'zip_code' =>  ['required',Validator::$validations["zip_code"]],
                'locality' =>['required',Validator::$validations["string_only_letters"]],
                'province' =>['required',Validator::$validations["string_only_letters"]],
                'country' => ['required',Validator::$validations["string_only_letters"]],
                'payment_method' => ['required',Validator::$validations["string_only_letters"]],
                'status_id' => 'required',
                'pdf' => ['required',Validator::$validations["pdf"]],
                'products' => ['required',Validator::$validations["array"]],
                'products.*' => 'array:id,quantity,pvp',
                'tracking_id' => ['required',Validator::$validations["alphanumeric"]],
            ];
        } else {
            return [
                'date' => ['required',Validator::$validations["date"]],
                'total' => '',
                'reference' => ['required',Validator::$validations["reference"]],
                'dni' => 'required',
                'first_name' => ['required',Validator::$validations["first_name"]],
                'last_name' => ['required',Validator::$validations["last_name"]],
                'email' =>  ['required',Validator::$validations["email"]],
                'phone_number' =>  ['required',Validator::$validations["phone"]],
                'address' => ['required',Validator::$validations["address"]],
                'zip_code' =>  ['required',Validator::$validations["zip_code"]],
                'locality' =>['required',Validator::$validations["string_only_letters"]],
                'province' =>['nulleable',Validator::$validations["string_only_letters"]],
                'country' => ['required',Validator::$validations["string_only_letters"]],
                'payment_method' => ['required',Validator::$validations["string_only_letters"]],
                'status_id' => 'required',
                'pdf' => '',
                'products' => ['required',Validator::$validations["array"]],
                'products.*' => 'array:id,quantity,pvp',
                'tracking_id' => ['required',Validator::$validations["alphanumeric"]],
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
