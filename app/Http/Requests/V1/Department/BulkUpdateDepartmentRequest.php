<?php

namespace App\Http\Requests\V1\Department;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateDepartmentRequest extends FormRequest
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
            'projects'                                  => 'required|array',
            'projects.*.id'                             => 'nullable|integer|exists:departments,id',
            'projects.*.title_en'                       => 'required|string',
            'projects.*.title_ar'                       => 'required|string',
            'projects.*.description_en'                 => 'required|string',
            'projects.*.description_ar'                 => 'required|string',
            'projects.*.participants_number'            => 'nullable|integer',
            'projects.*.groups_number'                  => 'nullable|integer',
            'projects.*.images'                         => 'nullable|array',
            'projects.*.images.*'                       => 'mimes:jpg,png,jpeg,gif,svg',
            'projects.*.image_replacements'             => 'nullable|array',
            'projects.*.image_replacements.*.id'        => 'integer|exists:media,id',
            'projects.*.image_replacements.*.new_image' => 'mimes:jpg,png,jpeg,gif,svg',
        ];
    }
}
