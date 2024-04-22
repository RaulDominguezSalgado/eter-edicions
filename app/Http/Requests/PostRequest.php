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
                'description' => 'required|string',
                'author_id' => 'required',
                'translator_id' => 'required',
                'content' => 'required|string',
                'date' => 'required',
                'location' => 'required',
                'image' => 'required',
                'publication_date' => 'required',
                'published_by' => 'required'
            ];
        }else{
            return [
                'title' => 'required|string',
                'description' => 'required|string',
                'author_id' => 'required',
                'translator_id' => 'required',
                'content' => 'required|string',
                'date' => 'required',
                'location' => 'required',
                'image' => '',
                'publication_date' => 'required',
                'published_by' => 'required'
            ];
        }

    }
}
