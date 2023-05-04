<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = ['seo_title', 'seo_description', 'seo_keywords', 'logo', 'favicon', 'contact_email', 'contact_map', 'contact_phone', 'about_us', 'social_instagram', 'socia_facebook', 'social_linkedin', 'social_twitter','social_youtube','social_whatsapp','social_pinterest','social_snapchat','social_tiktok','social_vimeo','social_snapchat','social_tiktok','social_vimeo','social_snapchat'];
}   
