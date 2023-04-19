<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Repositories\Contracts\BlogRepositoryInterface;


class BlogController extends Controller
{
    protected $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;    
    }

    public function index()
    {
        $blogs = $this->blogRepository->all();

        return view('blogs.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = $this->blogRepository->find($id);

        return view('blogs.show', compact('blog'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(BlogRequest $request)
    {   
        $blog = $this->blogRepository->create($request->validated());

        return redirect()->back()->with($blog  ? "success" : "error", true);
    }

    public function edit($id = 1) {
        $blog = $this->blogRepository->find($id);
        return view('blogs.edit',compact('blog'));
    }

    public function update(BlogRequest $request, $id)
    {
        $data = $request->validated();

        $this->blogRepository->update($data, $id);

        return redirect()->route('blogs.index');
    }

    public function destroy($id)
    {
        $this->blogRepository->delete($id);
        
        return redirect()->route('blogs.index');
    }
}