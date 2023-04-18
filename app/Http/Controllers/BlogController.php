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
        return view('blogs.createBlog');
    }

    public function store(BlogRequest $request)
    {
        $data = $request->all();
        
        $blog = $this->blogRepository->create($data);

        return redirect()->route('blogs.show', $blog->id);
    }

    public function update(BlogRequest $request, $id)
    {
        $data = $request->all();

        $this->blogRepository->update($data, $id);

        return redirect()->route('blogs.show', $id);
    }

    public function destroy($id)
    {
        $this->blogRepository->delete($id);

        return redirect()->route('blogs.index');
    }
}