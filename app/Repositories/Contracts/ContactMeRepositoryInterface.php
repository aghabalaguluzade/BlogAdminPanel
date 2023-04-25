<?php

namespace App\Repositories\Contracts;

interface ContactMeRepositoryInterface
{
    public function all();

    public function find($id);

    public function create(array $data);

    public function delete($id);
}
