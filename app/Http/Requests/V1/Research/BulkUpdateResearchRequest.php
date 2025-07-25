<?php

namespace App\Http\Requests\V1\Research;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateResearchRequest extends FormRequest
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
            'researches'            => 'required|array',
            'researches.*.title_en' => 'required|string',
            'researches.*.title_ar' => 'required|string'
        ];
    }
}
