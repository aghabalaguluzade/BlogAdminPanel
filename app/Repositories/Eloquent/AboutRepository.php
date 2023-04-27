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
         $about->description  = $data['description'];
         if (request()->hasFile('images')) {
         $images = request()->file('images');
         $directory = 'uploads/about/';
         $imagePaths = [];
     
         foreach ($images as $image) {
             $img_name = 'image_' . uniqid() . '.' . $image->getClientOriginalExtension();
             $image->move($directory, $img_name);
             $img_name = $img_name;
               array_push($imagePaths, $img_name);
         }
         
     
         $about->images = json_encode($imagePaths);
         $about->save();
         return $about;
     }
     
     }
     
    }

}
