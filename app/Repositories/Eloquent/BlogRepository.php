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
        $data['slug'] = Str::slug($data['title']);
        $blog = $this->model->findOrFail($id);
    
        if(request()->hasFile("img")) {
            $image = request()->file('img');
            $directory = 'uploads/blogs/';
            $img_name = Str::slug($data['title']) . '.' . $image->getClientOriginalExtension();
            
            if(file_exists($blog->img)) {
                unlink($blog->img);
            }
            
            $image->move($directory, $img_name);
            $img_name = $directory . $img_name;
            $blog['img'] = $img_name;
        }
        
        return $blog->update($data);

        // return $this->model->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        $this->model->findOrFail($id)->delete();
    }

    public function updateStatus($id, $status)
    {
        $blog = $this->model->findOrFail($id);
        $blog->status = $status;
        $blog->save();

        return $blog;
    }


}
