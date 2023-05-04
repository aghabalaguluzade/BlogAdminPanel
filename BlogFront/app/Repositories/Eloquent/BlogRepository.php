<?php

namespace App\Repositories\Eloquent;

use App\Models\Blog;
use App\Models\User;
use App\Repositories\Contracts\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface
{
    protected $blog;
    protected $user;

    public function __construct(Blog $blog, User $user)
    {
        $this->blog = $blog;
        $this->user = $user;

    }

    public function paginateBlogs()
    {
        return $this->blog->where('status', 1)->orderBy('created_at', 'desc')->paginate(1);
    }

    public function getBlogBySlug($slug)
    {
        return $this->blog->where('slug', $slug)->where('status', 1)->first();
    }

    public function getBlogRecent() {
        return $this->blog->where('status', 1)->orderBy('created_at', 'desc')->limit(6)->get();
    }

    public function readingTime($content) {
        $words_per_minute = 200;
        $words = str_word_count(strip_tags($content));
        $minutes = floor($words / $words_per_minute);
        $seconds = floor($words % $words_per_minute / ($words_per_minute / 60));
        return "$minutes dəqiqə $seconds saniyə";
    }

    public function search() {
        $query = request()->query('search');
        
        if($query) {
            return $this->blog->where('status', 1)->orderBy('created_at', 'desc')->where('title', 'like', '%'.$query.'%')->paginate(1);
        }else {
            return $this->blog->simplePaginate(1);
        }
    }

    public function getUser()
    {
        return $this->user->first();
    }
    
}