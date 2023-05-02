<?php

namespace App\Repositories\Eloquent;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Repositories\Contracts\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface
{
    protected $model;

    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    public function paginateBlogs()
    {
        return $this->model->where('status', 0)->orderBy('created_at', 'desc')->paginate(1);
    }

    public function getBlogBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    public function getBlogRecent() {
        return $this->model->orderBy('created_at', 'desc')->limit(6)->get();
    }

    public function readingTime($content) {
        $words_per_minute = 200;
        $words = str_word_count(strip_tags($content));
        $minutes = floor($words / $words_per_minute);
        $seconds = floor($words % $words_per_minute / ($words_per_minute / 60));
        return "$minutes dəqiqə $seconds saniyə";
    }
    
}