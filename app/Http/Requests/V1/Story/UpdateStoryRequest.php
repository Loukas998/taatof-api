<?php

namespace App\Http\Requests\V1\Story;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoryRequest extends FormRequest
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
        $rules = [
            'user_id'      => 'nullable|integer|exists:users,id',
            'state_id'     => 'nullable|integer|exists:states,id',
            'title'        => 'required|string|max:255',
            'note'         => 'required|string',
            'status'       => 'required|string|in:accepted,pending,rejected',
            'categories'   => 'nullable|array',
            //'categories.*' => 'exists:categories,id',
            'type'         => 'required|string|in:blog,vlog',
        ];

        if($this->input('type') === 'blog')
        {
            $rules += [
                'body'    => 'required|string',
                'summary' => 'required|string',
                'image'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ];
        }elseif($this->input('type') === 'vlog')
        {
            $rules += [
                'video'   => 'required|video|mimes:mp4|max:2048',
                'caption' => 'nullable|string'
            ];
        }

        return $rules;
    }
}
