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

    public function updateOrCreate($data) {

        

        return $this->model->updateOrCreate($data);
    }


}
