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
            'seo_title' => ['nullable','string'],
            'seo_description' => ['nullable','string'],
            'seo_keywords' => ['nullable','string'],
            'logo' => ['nullable','image', 'max:2048','mimes:png,jpg,jpeg,gif,jfif,webp'],
            'favicon' => ['nullable','image', 'max:2048', 'mimes:png,jpg,jpeg,gif,jfif,webp'],
            'contact_email' => ['nullable','string'],
            'contact_map' => ['nullable','string'],
            'contact_phone' => ['nullable','string'],
            'about_us' => ['sometimes'],
            'social_instagram' => ['nullable','string','url'],
            'social_facebook' => ['nullable','string','url'],
            'social_linkedin' => ['nullable','string','url'],
            'social_twitter' => ['nullable','string','url'],
            'social_youtube' => ['nullable','string','url']
        ];
    }
}
