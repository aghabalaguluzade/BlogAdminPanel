<?php

namespace App\Repositories\Eloquent;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use App\Repositories\Contracts\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface
{
    protected $model;
    protected $categories;

    public function __construct(Blog $model, Category $categories)
    {
        $this->model = $model;
        $this->categories = $categories;
    }

    public function all()
    {
        return $this->model->latest()->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        $image = $data['img'];
        $directory = config('apidomain.path') .'/blogs';
        $img_name = Str::slug($data['title']) . "." . $image->getClientOriginalExtension();
        $image->move($directory, $img_name);
        $img_name = $img_name;

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
            $directory = config('apidomain.path') .'/blogs';
            $img_name = Str::slug($data['title']) . '.' . $image->getClientOriginalExtension();
            
            if(file_exists($blog->img)) {
                unlink($blog->img);
            }
            
            $image->move($directory, $img_name);
            $img_name = $img_name;
            $data['img'] = $img_name;
        }
        
        return $blog->update($data);
    }

    public function delete($id)
    {
        $this->model->findOrFail($id)->delete();
    }

    public function updateStatus($id, $status)
    {
        $blog = $this->model->findOrFail($id);
        $blog->status = $blog->status == true ? false : true;
        $blog->save();

        return $blog;
    }

    public function categories()
    {
        $categories = $this->categories->select('id','name')->get();
        
        return $categories;
    }

    public function getBlogsWithTags()
    {
        return Blog::with('tags')->get();
    }

    public function getAllTags()
    {
        return Tag::all();
    }

    public function attachTags(Blog $blog, array $tagIds)
    {
        $blog->tags()->sync($tagIds);
    }

    public function syncTags($blogId, $tagIds)
    {
        $blog = Blog::findOrFail($blogId);
        $blog->tags()->sync($tagIds);
    }

}