<?php

namespace App\Http\Requests\V1\Story;

use Illuminate\Foundation\Http\FormRequest;

class CreateStoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id'            => 'required|integer|exists:users,id',
            'project_id'         => 'required|integer|exists:projects,id',
            'state_id'           => 'required|integer|exists:states,id',
            'title'              => 'required|string|max:255',
            'body'               => 'required|string',
            'note'               => 'required|string',
            'status'             => 'required|string|enum:accepted|pending|rejected',
            'image'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video'              => 'nullable|video|mimes:mp4|max:2048',
        ];
    }
}
