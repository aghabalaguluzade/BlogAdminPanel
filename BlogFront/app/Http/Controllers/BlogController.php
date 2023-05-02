<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\BlogRepositoryInterface;

class BlogController extends Controller
{
    protected $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;    
    }
    
    public function index() {

        $blogs = $this->blogRepository->paginateBlogs();

        return view('blogs', compact('blogs'));
    }

    public function show($slug) {
        
        $blog = $this->blogRepository->getBlogBySlug($slug);
        $recent_blog = $this->blogRepository->getBlogRecent();
        $reading_time =  $this->blogRepository->readingTime($blog->content);

        return view('blog', compact('blog','recent_blog', 'reading_time'));
    }

    public function home() {
        
        $blogs = $this->blogRepository->getBlogRecent();
        
        foreach ($blogs as $blog) {
            $reading_time = $this->blogRepository->readingTime($blog->content);
        }

        
        return view('index', compact('blogs', 'reading_time'));
    }
}
