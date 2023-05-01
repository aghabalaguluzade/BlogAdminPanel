<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\BlogRepositoryInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;    
    }
    
    public function index() {

        $blogs = $this->blogRepository->all();

        return view('blogs', compact('blogs'));
    }
}
