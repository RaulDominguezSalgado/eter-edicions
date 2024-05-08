<?php

namespace App\Http\Requests;

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
                'reference' => 'required|regex:/^[a-zA-Z0-9]+$/',
                'dni' => 'required',
                'first_name' => 'required|regex:/^[a-zA-Z]+$/|string', //'required|regex:/^[a-zA-Z]+$/|string',permite caracteres alfabéticos entre mayúsculas y minúsculas, creo no acepta comillas simples tampoco
                'last_name' => 'required|regex:/^[a-zA-Z]+$/|string',
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
}
