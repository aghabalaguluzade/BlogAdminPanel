<?php

namespace App\Repositories\Eloquent;

use App\Models\About;
use App\Repositories\Contracts\AboutRepositoryInterface;

class AboutRepository implements AboutRepositoryInterface
{
    protected $model;

    public function __construct(About $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id) {
          return $this->model->find($id);
    }
    

    public function updateOrCreate($data) {
    
     $about = $this->model->find(1);

     if (!$about) {
         $about = new About();
         $about->description = $data['description'];
         if (request()->hasFile('img')) {
            $image = request()->file('img');
            $directory = config('apidomain.path') .'/about';
            $img_name = 'image_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($directory, $img_name);
            $img_name = $directory.$img_name;
            $about['img'] = $img_name;
        }

        $about->save();
        return $about;
     }
     
        $about->description  = $data['description'];
        if (request()->hasFile('img')) {
                $image = request()->file('img');
                $directory = config('apidomain.path') .'/about';
                $img_name = 'image_' . uniqid() . '.' . $image->getClientOriginalExtension();
                if(file_exists($about->img)) {
                    unlink($about->img);
                }
                $image->move($directory, $img_name);
                $img_name = $directory.$img_name;
                $about->img = $img_name;
        }

            $about->save();
            return $about;
        }
}
