<?php

namespace App\Http\Requests\V1\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'auditor_id'    => 'nullable|integer|exists:users,id',
            'project_id'    => 'nullable|integer|exists:projects,id',   
            'first_name'    => 'required|string|max:255',
            'middle_name'   => 'nullable|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|email|max:255|unique:users,email',
            'phone_number'  => 'nullable|string|max:255',
            'password'      => 'required|string|max:255',
            'role'          => 'required|string|in:admin,auditor,media,participant',
        ];
    }
}
