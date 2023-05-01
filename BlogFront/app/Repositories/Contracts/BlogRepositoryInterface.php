<?php

namespace App\Repositories\Contracts;

interface BlogRepositoryInterface
{
    public function all();

    public function find($id);
}
