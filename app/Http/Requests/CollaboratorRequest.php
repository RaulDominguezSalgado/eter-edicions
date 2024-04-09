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
			'image' => 'required|string',
			'social_networks' => '',//TODO VALIDATION
            'name' => 'required',
            'last_name' => 'required',
            'biography' => 'required',
            'lang'=>'required|string|in:ca,es,ar-sy',
            'slug' => 'required',
        ];
    }
}
