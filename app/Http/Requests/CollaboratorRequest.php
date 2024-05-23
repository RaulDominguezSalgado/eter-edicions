<?php

namespace App\Http\Requests;

use App\Http\Actions\Validator;
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
            'social_networks' => '',//TODO VALIDATION
            'translations.*.first_name' => ["required",Validator::$validations['first_name']],
            'translations.*.last_name' => ['required',Validator::$validations['last_name']],
            'translations.*.biography' => ["required",Validator::$validations["biography"]],
            'translations.*.slug' => ['nullable',Validator::$validations["slug"]],
            'translations.*.meta_title' => ['nullable',Validator::$validations["meta_title"]],
            'translations.*.meta_description' => ['nullable',Validator::$validations["meta_description"]],
        ];

    }
}
