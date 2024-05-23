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
                'shipment_taxes' => ['nullable',Validator::$validations["decimal"]],
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
                'province' =>['nullable',Validator::$validations["string_only_letters"]],
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

}
