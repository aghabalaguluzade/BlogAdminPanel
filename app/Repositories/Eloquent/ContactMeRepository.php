<?php

namespace App\Repositories\Eloquent;

use App\Models\ContactMe;
use App\Repositories\Contracts\ContactMeRepositoryInterface;

class ContactMeRepository implements ContactMeRepositoryInterface
{
    protected $model;

    public function __construct(ContactMe $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $blog = $this->model->findOrFail($id);   
        return $blog->update($data);
    }

    public function delete($id)
    {
        $this->model->findOrFail($id)->delete();
    }
}
