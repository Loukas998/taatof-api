<?php

namespace App\Http\Requests\V1\Department;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
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
            'title_en'                       => 'required|string',
            'title_ar'                       => 'required|string',
            'description_en'                 => 'required|string',
            'description_ar'                 => 'required|string',
            'participants_number'            => 'nullable|integer',
            'groups_number'                  => 'nullable|integer',
            'images'                         => 'nullable|array',
            'images.*'                       => 'mimes:jpg,png,jpeg,gif,svg',
            'image_replacements'             => 'nullable|array',
            'image_replacements.*.id'        => 'integer|exists:media,id',
            'image_replacements.*.new_image' => 'mimes:jpg,png,jpeg,gif,svg',
        ];
    }
}
