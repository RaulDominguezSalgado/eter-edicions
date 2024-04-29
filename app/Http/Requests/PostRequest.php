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
                'location' => 'nullable',
                'image' => 'required',
                'publication_date' => 'required',
                'published_by' => 'required'
            ];
        } else {
            return [
                'title' => 'required|string',
                'description' => 'nullable|string',
                'author_id' => 'nullable',
                'translator_id' => 'nullable',
                'content' => 'required|string',
                'date' => 'nullable|date',
                'location' => 'nullable',
                'image' => '',
                'publication_date' => 'required',
                'published_by' => 'required'
            ];
        }
    }
}
