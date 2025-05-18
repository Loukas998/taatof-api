<?php

namespace App\Http\Requests\V1\Project;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateProjectRequest extends FormRequest
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
            'projects'                                => 'required|array',
            'projects.*.id'                           => 'required|integer|exists:projects,id',
            'projects.*.title_en'                     => 'required|string|max:255',
            'projects.*.title_ar'                     => 'required|string|max:255',
            'projects.*.home_description_en'          => 'nullable|string',
            'projects.*.home_description_ar'          => 'nullable|string',
            'projects.*.detailed_description_en'      => 'nullable|string',
            'projects.*.detailed_description_ar'      => 'nullable|string',
            'projects.images'                         => 'nullable|array',
            'projects.images.*'                       => 'image|mimes:jpeg,png,jpg,gif,svg',
            'projects.image_replacements'             => 'nullable|array',
            'projects.image_replacements.*.id'        => 'integer|exists:media,id',
            'projects.image_replacements.*.new_image' => 'mimes:jpg,png,jpeg,gif,svg',
        ];
    }
}
