<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlRequest extends FormRequest
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
            'urlEntered' => 'required|max:255|min:10'
        ];
    }

    public function messages(): array
    {
        return [
            'urlEntered.required' => 'The URL field is required.',
            'urlEntered.max' => 'The URL field must not exceed 255 characters.',
            'urlEntered.min' => 'The URL must be at least 10 characters long.'
        ];
    }
}
