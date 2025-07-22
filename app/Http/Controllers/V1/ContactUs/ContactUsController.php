<?php

namespace App\Http\Controllers\V1\ContactUs;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\V1\ContactUs\UpdateContactUsRequest;
use App\Http\Resources\V1\ContactUs\ContactUsDashResource;
use App\Http\Resources\V1\ContactUs\ContactUsResource;
use App\Models\ContactUs\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{
    public function index()
    {
        $contactUs = ContactUs::where('id', 1)->first();
        $accept_language = request()->header('Accept-Language');
        if($accept_language && ($accept_language === 'en' || $accept_language === 'ar'))
        {
            return ApiResponse::success(ContactUsResource::make($contactUs), 'Contact Us retrieved');
        }
        return ApiResponse::success(ContactUsDashResource::make($contactUs), 'Contact Us retrieved');
    }

    public function bulk_update(UpdateContactUsRequest $request)
    {
        $data = $request->validated();
        ContactUs::query()->delete();
        DB::statement('ALTER TABLE contact_us AUTO_INCREMENT = 1');
        $contactUs = ContactUs::create($data);
        return ApiResponse::success(ContactUsDashResource::make($contactUs), 'Contact Us updated');
    }
}
