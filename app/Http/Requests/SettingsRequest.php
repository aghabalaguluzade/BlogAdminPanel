<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'seo_title' => ['string'],
            'seo_description' => ['string'],
            'seo_keywords' => ['string'],
            'logo' => ['string','image', 'max:2048','mimes:png,jpg,jpeg,gif,jfif,webp'],
            'favicon' => ['string','image', 'max:2048', 'mimes:png,jpg,jpeg,gif,jfif,webp'],
            'contact_email' => ['string'],
            'contact_map' => ['string'],
            'contact_phone' => ['string'],
            'about_us' => ['string'],
            'social_instagram' => ['string','url'],
            'social_facebook' => ['string','url'],
            'social_linkedin' => ['string','url'],
            'social_twitter' => ['string','url'],
            'social_youtube' => ['string','url']
        ];
    }
}
