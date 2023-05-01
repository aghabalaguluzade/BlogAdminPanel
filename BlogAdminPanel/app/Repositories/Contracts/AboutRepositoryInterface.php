<?php

namespace App\Repositories\Contracts;

interface AboutRepositoryInterface
{
    public function all();

    public function find($id);

    public function updateOrCreate($data);

}