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
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        $image = $data['img'];
        $directory = 'uploads/blogs/';
        $img_name = Str::slug($data['title']) . "." . $image->getClientOriginalExtension();
        $image->move($directory, $img_name);
        $img_name = $directory . $img_name;

        $data['img'] = $img_name;
        $data['slug'] = Str::slug($data['title']);

        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        $this->model->findOrFail($id)->delete();
    }

}
