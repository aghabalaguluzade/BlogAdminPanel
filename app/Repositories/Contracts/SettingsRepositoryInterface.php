<?php

namespace App\Repositories\Contracts;

interface SettingsRepositoryInterface
{
    public function all();

    public function find($id);

    public function updateOrCreate(array $data);

}