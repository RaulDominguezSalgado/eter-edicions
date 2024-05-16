<?php

namespace App\Http\Requests;

use App\Http\Actions\Validator;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'slug' => '',
            'title' => ['required',Validator::$validations["title"]],
            'authors' => ['required',Validator::$validations["array"]],
            'translators' => ['nullable',Validator::$validations["array"]],
            'description' => 'required',
            'lang' => ['required',Validator::$validations["array"]],
            'isbn' => ['required',Validator::$validations["isbn"]],
            'publisher' => '',
            'image' => '',
            'image_file' => ['nullable',Validator::$validations["image"]],
            'pvp' => ['required',Validator::$validations["decimal"]],
            'iva' => ['required',Validator::$validations["decimal"]],
            'discounted_price' => ['numeric','regex:/^\d+(\.\d+)?$/'],
            'stock' => ['nullable',Validator::$validations["integer"]],
            'visible' => ['required',Validator::$validations["boolean"]],
            'sample' => ['nullable',Validator::$validations["pdf"]],
            'number_of_pages' => ['nullable',Validator::$validations["integer"]],
            'publication_date' => ['nullable',Validator::$validations["date"]],
            'collaborators' => '',
            'collections' => ['required',Validator::$validations["array"]],
            'extras' => ['required',Validator::$validations["array"]],
            // 'extras' => 'array:key,value',
            'original_title' => 'nullable',
            'original_publication_date' => 'nullable',
            'original_publisher' => 'nullable',
            'legal_diposit' => ['nullable',Validator::$validations["legal_diposit"]],
            'headline' => '',
            'size' => ['nullable',Validator::$validations["dimensions"]],
            'enviromental_footprint' => ['nullable',Validator::$validations["enviromental_footprint"]],
            'meta_title' => '',
            'meta_description' => '',
            // "asdas"=>"required"
        ];
    }
}
