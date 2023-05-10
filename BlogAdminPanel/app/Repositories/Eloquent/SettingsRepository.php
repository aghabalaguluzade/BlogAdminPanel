<?php

namespace App\Repositories\Eloquent;

use App\Models\Settings;
use App\Repositories\Contracts\SettingsRepositoryInterface;
use Illuminate\Validation\Rules\Unique;

class SettingsRepository implements SettingsRepositoryInterface
{
    protected $model;

    public function __construct(Settings $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id) {
        return $this->model->findOrFail($id);
    }

    public function updateOrCreate($data)
    {
        $settings = $this->model->find(1);

        if($settings == null) {
            $settings = new Settings;
            if (request()->hasFile("logo")) {
                $image = request()->file('logo');
                $directory = config('apidomain.path') .'/settings';
                $img_name_logo = uniqid(true) . 'logo' . '.' . $image->getClientOriginalExtension();
                $image->move($directory, $img_name_logo);
                $img_name_logo = $directory . $img_name_logo;
                // $settings->logo = $img_name_logo;
                $data['logo'] = $img_name_logo;
            }
     
            if (request()->hasFile("favicon")) {
                $image = request()->file('favicon');
                $directory = config('apidomain.path') .'/settings';
                $img_name_favicon = uniqid(true) . 'favicon' . '.' . $image->getClientOriginalExtension();
                $image->move($directory, $img_name_favicon);
                $img_name_favicon = $directory . $img_name_favicon;
                // $settings->favicon = $img_name_favicon;
                $data['favicon'] = $img_name_favicon;
                
            }

            return $this->model->updateOrCreate($data);

        }

        $settings['seo_title'] = $data['seo_title'] ?? $settings['seo_title'];
        $settings['seo_description'] = $data['seo_description'] ?? $settings['seo_description'];
        $settings['seo_keywords'] = $data['seo_keywords'] ?? $settings['seo_keywords'];
        $settings['contact_phone'] = $data['contact_phone'] ?? $settings['contact_phone'];
        $settings['contact_email'] = $data['contact_email'] ?? $settings['contact_email'];
        $settings['contact_map'] = $data['contact_map'] ?? $settings['contact_map'];
        $settings['about_us'] = $data['about_us'] ?? $settings['about_us'];
        $settings['social_instagram'] = $data['social_instagram'] ?? $settings['social_instagram'];
        $settings['social_facebook'] = $data['social_facebook'] ?? $settings['social_facebook'];
        $settings['social_twitter'] = $data['social_twitter'] ?? $settings['social_twitter'];
        $settings['social_linkedin'] = $data['social_linkedin'] ?? $settings['social_linkedin'];
        $settings['social_youtube'] = $data['social_youtube'] ?? $settings['social_youtube'];
    

        if (request()->hasFile("logo")) {
            $image = request()->file('logo');
            $directory = config('apidomain.path') .'/settings';
            $img_name_logo = uniqid(true) . 'logo' . '.' . $image->getClientOriginalExtension();

            if (file_exists($settings?->logo)) {
                unlink($settings->logo);
            }

            $image->move($directory, $img_name_logo);
            $img_name_logo = $directory . $img_name_logo;
            $settings->logo = $img_name_logo;
            // $settings['logo'] = $img_name_logo;
        }
 
        if (request()->hasFile("favicon")) {
            $image = request()->file('favicon');
            $directory = config('apidomain.path') .'/settings';
            $img_name_favicon = uniqid(true) . 'favicon' . '.' . $image->getClientOriginalExtension();

            if (file_exists($settings?->favicon)) {
                unlink($settings->favicon);
            }

            $image->move($directory, $img_name_favicon);
            $img_name_favicon = $directory . $img_name_favicon;
            $settings->favicon = $img_name_favicon;
            // $settings['favicon'] = $img_name_favicon;
            
        }

        return $settings->save();

        // return $this->model->updateOrCreate($data);

    }
   
}