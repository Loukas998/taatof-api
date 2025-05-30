<?php

namespace App\Http\Requests\V1\ContactUs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactUsRequest extends FormRequest
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
            'email'        => 'required|email',
            'phone_number' =>'required|string',
            'location_en'  =>'required|string',
            'location_ar'  =>'required|string',
            'facebook'     =>'required|string',
            'instagram'    =>'required|string',
            'linkedin'     =>'required|string',
        ];
    }
}
