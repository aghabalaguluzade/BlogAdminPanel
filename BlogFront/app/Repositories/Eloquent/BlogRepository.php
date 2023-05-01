<?php

namespace App\Repositories\Eloquent;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Repositories\Contracts\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface
{
    protected $model;

    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all()->where('status', '0');
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

}