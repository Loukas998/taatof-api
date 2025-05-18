<?php

namespace App\Http\Requests\V1\Manual;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateManualRequest extends FormRequest
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
           'manuals'                  => 'array|required',
           'manuals.*.id'             => 'nullable|integer|exists:manuals,id',
           'manuals.*.title_ar'       => 'required|string|max:255',
           'manuals.*.title_en'       => 'required|string|max:255',
           'manuals.*.description_ar' => 'nullable|string',
           'manuals.*.description_en' => 'nullable|string',
        ];
    }
}
