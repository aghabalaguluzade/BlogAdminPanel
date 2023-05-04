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
          return $this->model->first();
     }
}