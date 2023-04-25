<?php

namespace App\Repositories\Eloquent;

use App\Models\Settings;
use App\Repositories\Contracts\GeneralRepositoryInterface;

class GeneralRepository implements GeneralRepositoryInterface
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

    public function updateOrCreate($data)
    {
        $blog = $this->model->all()->first();

            if (request()->hasFile("logo")) {
                $image = request()->file('logo');
                $directory = 'uploads/settings/';
                $img_name = $data['seo_title'] . '.' . $image->getClientOriginalExtension();
    
                if (file_exists($blog->logo)) {
                    unlink($blog->logo);
                }
    
                $image->move($directory, $img_name);
                $img_name = $directory . $img_name;
                $blog->logo = $img_name;
            }
    
            if (request()->hasFile("favicon")) {
                $image = request()->file('favicon');
                $directory = 'uploads/settings/';
                $img_name = $data['seo_title'] . '.' . $image->getClientOriginalExtension();
    
                if (file_exists($blog->favicon)) {
                    unlink($blog->favicon);
                }
    
                $image->move($directory, $img_name);
                $img_name = $directory . $img_name;
                $blog->favicon = $img_name;
            }

        return $this->model->updateOrCreate($data);
    }

}
