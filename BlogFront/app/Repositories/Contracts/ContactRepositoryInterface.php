<?php

namespace App\Repositories\Contracts;

interface ContactRepositoryInterface 
{

     public function getSettings();

     public function create(array $data);

}