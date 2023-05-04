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
        $user = $this->blogRepository->getUser();
        $reading_time = [];
        foreach ($blogs as $blog) {
            $reading_time[] =  $this->blogRepository->readingTime($blog->content);
        }

        return view('blogs', compact('blogs', 'user', 'reading_time'));
    }

    public function show($slug) {
        
        $blog = $this->blogRepository->getBlogBySlug($slug);
        $blog->increment('view_count');
        $recent_blog = $this->blogRepository->getBlogRecent();
        $reading_time =  $this->blogRepository->readingTime($blog->content);
        $reading_time_recent_blog = [];
        foreach ($recent_blog as $recent) {
            $reading_time_recent_blog[] = $this->blogRepository->readingTime($recent->content);
        }
        $user = $this->blogRepository->getUser();

        return view('blog', compact('blog','recent_blog', 'reading_time', 'reading_time_recent_blog' , 'user'));
    }

    public function home() {
        
        $blogs = $this->blogRepository->getBlogRecent();
        $user = $this->blogRepository->getUser();
        $reading_time = [];

        foreach ($blogs as $blog) {
            $reading_time[] = $this->blogRepository->readingTime($blog->content);
        }

        
        return view('index', compact('blogs', 'reading_time', 'user'));
    }

    public function search() {

        $blogs = $this->blogRepository->search();

        return view('search', compact('blogs'));
    }
}
