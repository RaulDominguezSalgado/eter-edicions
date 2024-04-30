<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
                'title' => 'required|string',
                'description' => 'nullable|string',
                'author_id' => 'nullable',
                'translator_id' => 'nullable',
                'content' => 'required|string',
                'date' => 'date',
                'time' => '', //buscar regex format 00:00:00, 00 son números de 2 dígitos
                'location' => 'nullable',
                'image' => 'required',
                'publication_date' => 'required',
                'published_by' => 'required',
                'slug' => 'nullable|string',
                'meta_title' => 'nullable|string',
                'meta_description' => 'nullable|string'
            ];
        } else {
            return [
                'title' => 'required|string',
                'description' => 'nullable|string',
                'author_id' => 'nullable',
                'translator_id' => 'nullable',
                'content' => 'required|string',
                'date' => 'nullable|date',
                'time' => '', //buscar regex format 00:00:00, 00 son números de 2 dígitos
                'location' => 'nullable',
                'image' => '',
                'publication_date' => 'required',
                'published_by' => 'required',
                'slug' => 'nullable|string',
                'meta_title' => 'nullable|string',
                'meta_description' => 'nullable|string'
            ];
        }
    }
}
