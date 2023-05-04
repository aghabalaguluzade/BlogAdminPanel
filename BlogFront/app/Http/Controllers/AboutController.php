<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\AboutRepositoryInterface;

class AboutController extends Controller
{
     protected $aboutRepository;

     public function __construct(AboutRepositoryInterface $aboutRepository) {
          $this->aboutRepository = $aboutRepository;
     }

    public function index() {

     $about = $this->aboutRepository->all();

     return view('about', compact('about'));
    }
}
