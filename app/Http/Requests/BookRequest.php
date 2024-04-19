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
            'description' => 'required',
            'lang' => '',
            'isbn' => 'required',
            'publisher' => '',
            'image' => '',
            'pvp' => '',
            'iva' => '',
            'discounted_price' => '',
            'stock' => '',
            'visible' => '',
            'sample' => '',
            'number_of_pages' => '',
            'publication_date' => '',
            'collaborators' => '',
            'original_title' => '',
            'original_publication_date' => '',
            'original_publisher' => '',
            'legal_diposit' => '',
            'headline' => '',
            'size' => '',
            'enviromental_footprint' => '',
            'meta_title' => '',
            'meta_description' => '',
        ];
    }
}
