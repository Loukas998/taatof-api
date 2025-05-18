<?php

namespace App\Http\Requests\V1\Training;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateTrainingRequest extends FormRequest
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
            'trainings'                  => 'required|array',
            'trainings.*.id'             => 'nullable|integer|exists:trainings,id',
            'trainings.*.title_en'       => 'required|string|max:255',
            'trainings.*.title_ar'       => 'required|string|max:255',
            'trainings.*.description_en' => 'nullable|string',
            'trainings.*.description_ar' => 'nullable|string',
            'trainings.*.location_en'    => 'nullable|string',
            'trainings.*.location_ar'    => 'nullable|string',
            'trainings.*.image'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
