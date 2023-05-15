<?php

namespace App\Repositories\Contracts;

use App\Models\Blog;

interface BlogRepositoryInterface
{
    public function all();

    public function find($id);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function updateStatus(array $id, $data);
    
    public function categories();

    public function getBlogsWithTags();

    public function getAllTags();

    public function attachTags(Blog $blog, array $tagIds);

    public function syncTags($blogId, $tagIds);

}
