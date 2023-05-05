<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\BlogRequest;
use App\Http\Resources\Api\V1\BlogResource;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BlogResource::collection(Blog::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $data = $request->validated();
        $image = $request->file("img");
        $directory = config('subdomain.path') . "uploads/blogs/";
        $image_name = Str::slug($request->title). '.' . $image->getClientOriginalExtension();
        $image->move($directory,$image_name);
        $image_name = $directory.$image_name;
        $data["img"] = $image_name;
        $blog = Blog::create($data);
        return new BlogResource($blog);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return new BlogResource($blog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {

        $blog->update($request->validate());

        if($request->hasFile("img")) {
            $data = $request->validated();
            $image = $request->file("img");
            $directory = config('subdomain.path') . "uploads/blogs/";
            $image_name = Str::slug($request->title). '.' . $image->getClientOriginalExtension();
            if(file_exists($blog->img)) {
                unlink($blog->img);
            };
            $image->move($directory,$image_name);
            $image_name = $directory.$image_name;
            $data["img"] = $image_name;
            $blog->update($data);
        }

        return new BlogResource($blog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $deleted = $blog->delete();
        if($deleted) {
            if(file_exists($blog->img)) {
                unlink($blog->img);
            };
        };
        return response()->noContent();
    }
}
