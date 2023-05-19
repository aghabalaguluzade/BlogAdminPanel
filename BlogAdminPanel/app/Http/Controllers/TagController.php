<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Repositories\Eloquent\GeneralRepository;

class TagController extends Controller
{
    protected $genericRepository;

    public function __construct(GeneralRepository $genericRepository)
    {
        $this->genericRepository = $genericRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = $this->genericRepository->all(new Tag());
        
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $tag = $this->genericRepository->create(new Tag(), $request->validated());

        return redirect()->back()->with($tag ? "success" : "error", true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tag = $this->genericRepository->update($tag, $tag->id, $request->validated());
        
        return redirect()->back()->with($tag ? "success" : "error", true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag = $this->genericRepository->delete($tag,$tag->id);

        return redirect()->back()->with($tag ? "success" : "error", true);
    }
}
