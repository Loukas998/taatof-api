<?php

namespace App\Http\Requests\V1\Category;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateCategoryRequest extends FormRequest
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
            'categories'                  => 'required|array',
            'categories.*.id'             => 'nullable|integer|exists:categories,id',
            'categories.*.project_id'     => 'required|integer|exists:projects,id',
            'categories.*.name_en'        => 'required|string|max:255',
            'categories.*.name_ar'        => 'required|string|max:255',
            'categories.*.description_en' => 'nullable|string',
            'categories.*.description_ar' => 'nullable|string',
            'categories.*.image'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
