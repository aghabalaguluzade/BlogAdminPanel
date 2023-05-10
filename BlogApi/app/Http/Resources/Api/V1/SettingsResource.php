<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'seo_title' => $this->seo_title,
            'seo_description' => $this->seo_description,
            'seo_keywords' => $this->seo_keywords,
            'logo' => config('subdomain.path') . $this->logo,
            'favicon' => config('subdomain.path') . $this->favicon,
            'about_us' => $this->about_us,
            'contact_email' => $this->contact_email,
            'contact_map' => $this->contact_map,
            'contact_phone' => $this->contact_phone,
            'social_facebook' => $this->social_facebook,
            'social_instagram' => $this->social_instagram,
            'social_linkedin' => $this->social_linkedin,
            'social_twitter' => $this->social_twitter,
            'social_youtube' => $this->social_youtube,
            'created_at' => $this->created_at
        ];
    }
}
