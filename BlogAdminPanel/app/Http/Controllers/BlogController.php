<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Http\Requests\StatusRequest;
use App\Repositories\Contracts\BlogRepositoryInterface;
use Illuminate\Http\Request;

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
        $categories = $this->blogRepository->categories();
        return view('admin.blogs.index', compact('blogs'))->with('categories', $categories);
    }

    public function show($id)
    {
        $blog = $this->blogRepository->find($id);

        return view('admin.blogs.show', compact('blog'));
    }

    public function create()
    {
        $categories = $this->blogRepository->categories();

        return view('admin.blogs.create')->with('categories', $categories);
    }

    public function store(BlogRequest $request)
    {   
        $data = $request->validated();
        $blog = $this->blogRepository->create($data);
        
        return redirect()->back()->with($blog  ? "success" : "error", true);
    }

    public function edit($id) {
        $blog = $this->blogRepository->find($id);
        $categories = $this->blogRepository->categories();
        return view('admin.blogs.edit',compact('blog'))->with('categories', $categories);
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

    public function updateStatus(StatusRequest $request, $id)
    {
        $blog = $this->blogRepository->updateStatus($id, $request->status);
        return response()->json($blog);
    }

}