<?php

namespace App\Http\Requests;

use App\Http\Actions\Validator;
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
                'title' => ['required'],
                'description' => ['nullable', Validator::$validations["description"]],
                'author_id' => ['nullable'],
                'translator_id' => ['nullable'],
                'content' => ['required'],
                'date' => ['nullable', Validator::$validations["date"]],
                // 'time' => 'nullable|date_format:H:i', //buscar regex format 00:00:00, 00 son números de 2 dígitos
                'time' => ['nullable', Validator::$validations["time"]],
                'location' => ['nullable'],
                'image' => ['required', Validator::$validations["image"]],
                'publication_date' => ['required'],
                'published_by' => ['required'],
                'slug' => ['nullable', Validator::$validations["slug"]],
                'meta_title' => ['nullable', Validator::$validations["slug"]],
                'meta_description' => ['nullable', Validator::$validations["slug"]]
            ];
        } else {
            return [
                'title' => ['required'],
                'description' => ['nullable', Validator::$validations["description"]],
                'author_id' => ['nullable'],
                'translator_id' => ['nullable'],
                'content' => ['required'],
                'date' => ['nullable', Validator::$validations["date"]],
                'time' => 'nullable', //buscar regex format 00:00:00, 00 son números de 2 dígitos
                'location' => ['nullable'],
                'image' => '',
                'publication_date' => ['required'],
                'published_by' => ['required'],
                'slug' => ['nullable', Validator::$validations["slug"]],
                'meta_title' => ['nullable', Validator::$validations["slug"]],
                'meta_description' => ['nullable', Validator::$validations["slug"]]
            ];
        }
    }

    /**

     *Configure the validator instance.*
     *@param \Illuminate\Validation\Validator $validator
     *@return void*/
    public function withValidator(\Illuminate\Validation\Validator $validator)
    {
        $validator->after(function ($validator) {
            $type = $this->input('select-type');
            $data = $this->input("date");
            $time = $this->input("time");

            $author = $this->input("author_id");
            $translator = $this->input("translator_id");

            if ($type === "activity" && $data == "" || $data == null) {
                $validator->errors()->add('date', 'El Date es obligatorio');
            }elseif ($type === "activity" && $time == "" || $time == null){
                $validator->errors()->add('date', 'El Time es obligatorio');
            }elseif ($type === "activity" && $time == "" || $time == null){
                $validator->errors()->add('date', 'El Time es obligatorio');
            }
            elseif ($type === "article" && $author == "" || $author == null){
                $validator->errors()->add('date', 'El Author es obligatorio');
            }elseif ($type === "article" && $translator == "" || $translator == null){
                $validator->errors()->add('date', 'El Translator es obligatorio');
            }
        });
    }
}
