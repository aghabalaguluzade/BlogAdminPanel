<?php

namespace App\Repositories\Contracts;

interface GeneralRepositoryInterface
{
    public function all();

    public function updateOrCreate($data);


}
