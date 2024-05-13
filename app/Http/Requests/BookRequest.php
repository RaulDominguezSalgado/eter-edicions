<?php

namespace App\Http\Requests;

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
            'title' => 'required',
            'authors' => 'required|array',
            'translators' => 'nullable|array',
            'description' => 'required',
            'lang' => 'required|array',
            'isbn' => 'required|regex:/^[\d-]+$/',
            'publisher' => '',
            'image' => '',
            'image_file' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp,tiff,bmp',
            'pvp' => ['required','numeric','regex:/^\d+(\.\d+)?$/', 'gte:0.01'],
            'iva' => ['required','numeric','regex:/^\d+(\.\d+)?$/'],
            'discounted_price' => ['numeric','regex:/^\d+(\.\d+)?$/'],
            'stock' => 'nullable|integer',
            'visible' => 'required|boolean',
            'sample' => 'nullable|file|mimes:pdf',
            'number_of_pages' => 'nullable|integer',
            'publication_date' => 'nullable|date',
            'collaborators' => '',
            'collections' => 'array|required',
            'extras' => 'array',
            'extras.*' => 'array:key,value',
            'original_title' => 'nullable',
            'original_publication_date' => 'nullable',
            'original_publisher' => 'nullable',
            'legal_diposit' => 'nullable|regex:/^[a-zA-Z -]+$/',
            'headline' => '',
            //'size' => 'nullable|regex:/^[0-9]+[Xx]?(\s[CMcm][CMcm])?$/',
            //'size' => 'required|regex:/^[0-9]+[xX]?(\s[0-9]+[xX])?(\s[CMcm][CMcm])?$/',
            'size' => 'nullable|regex:/^([0-9]+[xX]?\s?[0-9]+)?(\s[CMcm][CMcm])?$/',
            //'nullable'|'regex:/^[0-9]+[Xx]?(\s[CMcm][CMcm])?$/',
            'enviromental_footprint' => 'nullable',
            'meta_title' => '',
            'meta_description' => '',
        ];
    }
}
