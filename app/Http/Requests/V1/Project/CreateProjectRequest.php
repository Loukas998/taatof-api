<?php

namespace App\Http\Requests\V1\Project;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'title_en'                => 'required|string|max:255',
            'title_ar'                => 'required|string|max:255',
            'home_description_en'     => 'required|string',
            'home_description_ar'     => 'required|string',
            'detailed_description_en' => 'required|string',
            'detailed_description_ar' => 'required|string',
            'images'                  => 'nullable|array',
            'images.*'                => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
