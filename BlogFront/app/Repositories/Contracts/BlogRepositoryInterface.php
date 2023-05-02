<?php

namespace App\Repositories\Contracts;

interface BlogRepositoryInterface
{
    public function paginateBlogs();

    public function getBlogBySlug($slug);

    public function getBlogRecent();

    public function readingTime($content);
    
}