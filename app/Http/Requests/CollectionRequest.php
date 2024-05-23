<?php

namespace App\Http\Requests;

use App\Http\Actions\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CollectionRequest extends FormRequest
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
            'lang'=>'',
            'translations.*.name' => ['required',Validator::$validations["name"]],
            'translations.*.description' =>['required',Validator::$validations["description"]],
            'translations.*.slug' => ['nullable',Validator::$validations["slug"]],
            'translations.*.meta_title' => ['nullable',Validator::$validations["name"]],
            'translations.*.meta_description' => ['nullable',Validator::$validations["description"]],
        ];
    }
}
