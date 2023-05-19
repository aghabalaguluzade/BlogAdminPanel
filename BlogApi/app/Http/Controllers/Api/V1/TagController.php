<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\BlogResource;
use App\Http\Resources\Api\V1\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TagResource::collection(Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return new TagResource($tag);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
    }

    public function getBlogsByTag(Request $request)
    {
        $tagId = $request->header('id');

        $tag = Tag::find($tagId);

        if (!$tag) {
            return response()->json(['message' => 'Taq yoxdur'], 404);
        }

        $blogs = $tag->blogs()
            ->with('tags')
            ->whereHas('category', function ($query) {
                $query->where('status', true);
            })
            ->get();

        if ($blogs->isEmpty()) {
            return response()->json(['message' => 'Verilmiş teq üçün heç bir bloq tapılmadı'], 404);
        }

        return BlogResource::collection($blogs);
    }
    
    public function getTagsByBlog(Request $request)
    {
        $tagId = $request->header('id');

        $tag = Tag::find($tagId);

        if (!$tag) {
            return response()->json(['message' => 'Taq yoxdu'], 404);
        }

        $blogs = $tag->blogs()->with('tags')->get();

        if ($blogs->isEmpty()) {
            return response()->json(['message' => 'Verilmiş teq üçün heç bir bloq tapılmadı'], 404);
        }

        $tagData = [
            'id' => $tag->id,
            'name' => $tag->name,
            'blogs' => BlogResource::collection($blogs)
        ];

        return response()->json([$tagData]);
    }
    


}
