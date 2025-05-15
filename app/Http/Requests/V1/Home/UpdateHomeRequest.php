<?php

namespace App\Http\Requests\V1\Home;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHomeRequest extends FormRequest
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
            'title'                          => 'required|string',
            'subtitle'                       => 'required|string',
            'trainings_number'               => 'required|integer',
            'trainers_number'                => 'required|integer',
            'stories_number'                 => 'required|integer',
            'life_groups_members'            => 'required|integer',
            'images'                         => 'nullable|array',
            'images.*'                       => 'mimes:jpg,png,jpeg,gif,svg',
            'image_replacements'             => 'nullable|array',
            'image_replacements.*.id'        => 'integer|exists:media,id',
            'image_replacements.*.new_image' => 'mimes:jpg,png,jpeg,gif,svg',
        ];
    }
}
