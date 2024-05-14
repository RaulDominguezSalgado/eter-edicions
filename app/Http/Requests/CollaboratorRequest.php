<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollaboratorRequest extends FormRequest
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
			//'social_networks' => '',//TODO VALIDATION
            // 'first_name' => 'required|regex:/^[^0-9\?\!\$\%\&]+$/|string',
            // 'last_name' => 'required|regex:/^[^0-9\?\!\$\%\&]+$/|string',
            // 'biography' => 'required',
            // 'lang'=>'required',
            'social_networks' => '',//TODO VALIDATION
            'translations.*.first_name' => 'required|regex:/^[a-zA-Z\s]+$/|string',
            'translations.*.last_name' => 'required|regex:/^[a-zA-Z\s]+$/|string',
            'translations.*.biography' => 'required|string',
            //'lang'=>'',
        ];

    }
}
