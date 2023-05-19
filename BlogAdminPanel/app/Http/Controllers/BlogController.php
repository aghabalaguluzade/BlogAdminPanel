<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Http\Requests\StatusRequest;
use App\Repositories\Contracts\BlogRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    protected $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;    
    }

    public function index()
    {
        $headers = [
                'id' => '1',
            ];
            $response = Http::withHeaders($headers)->get('http://127.0.0.1:5000/api/categories/blogs')->json();
        dd($response);
            // $blogs = $this->blogRepository->all();
        // $categories = $this->blogRepository->categories();
        // $blogs = $this->blogRepository->getBlogsWithTags();
        return view('admin.blogs.index');
    }

    public function show($id)
    {
        $blog = $this->blogRepository->find($id);

        return view('admin.blogs.show', compact('blog'));
    }

    public function create()
    {
        $categories = $this->blogRepository->categories();
        $tags = $this->blogRepository->getAllTags();

        return view('admin.blogs.create')->with('categories', $categories)->with('tags', $tags);
    }

    public function store(BlogRequest $request)
    {   
        $data = $request->validated();
        $blog = $this->blogRepository->create($data);
        
        if ($blog) {
            // Blog başarıyla oluşturuldu, şimdi etiketleri ekleyelim
            if ($request->has('tags')) {
                $tagIds = $request->input('tags');
                $this->blogRepository->attachTags($blog, $tagIds);
            }
            return redirect()->back()->with($blog  ? "success" : "error", true);
        } else {
            return redirect()->back()->with('error', true);
        }

        return redirect()->back()->with($blog  ? "success" : "error", true);
    }

    public function edit($id) {
        $blog = $this->blogRepository->find($id);
        $categories = $this->blogRepository->categories();
        $tags = $this->blogRepository->getAllTags();
        return view('admin.blogs.edit',compact('blog'))->with('categories', $categories)->with('tags', $tags);
    }

    public function update(BlogRequest $request, $id)
    {
        $data = $request->validated();

        $this->blogRepository->update($data, $id);
        
        if ($request->has('tags')) {
            $tagIds = $request->input('tags');
            $this->blogRepository->syncTags($id, $tagIds);
        }

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