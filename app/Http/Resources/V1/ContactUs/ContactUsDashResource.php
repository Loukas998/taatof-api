<?php

namespace App\Http\Resources\V1\ContactUs;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactUsDashResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'email'        => $this->email,
            'phone_number' => $this->phone_number,
            'location_en'  => $this->getTranslation('location', 'en'),
            'location_ar'  => $this->getTranslation('location', 'ar'),
        ];
    }
}
