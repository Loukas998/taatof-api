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
            'departments'                                  => 'required|array',
            'departments.*.id'                             => 'nullable|integer|exists:departments,id',
            'departments.*.title_en'                       => 'required|string',
            'departments.*.title_ar'                       => 'required|string',
            'departments.*.description_en'                 => 'required|string',
            'departments.*.description_ar'                 => 'required|string',
            'departments.*.participants_number'            => 'nullable|integer',
            'departments.*.groups_number'                  => 'nullable|integer',
            'departments.*.images'                         => 'nullable|array',
            'departments.*.images.*'                       => 'mimes:jpg,png,jpeg,gif,svg',
            'departments.*.image_replacements'             => 'nullable|array',
            'departments.*.image_replacements.*.id'        => 'integer|exists:media,id',
            'departments.*.image_replacements.*.new_image' => 'mimes:jpg,png,jpeg,gif,svg',
        ];
    }
}
