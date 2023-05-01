<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Repositories\Contracts\AboutRepositoryInterface;

class AboutController extends Controller
{
    protected $aboutRepository;

    public function __construct(AboutRepositoryInterface $aboutRepository)
    {
        $this->aboutRepository = $aboutRepository;
    }

    public function index() {
        $about = $this->aboutRepository->find(1);
        return view('admin.about.create',compact('about'));
    }

    public function updateOrCreate(AboutRequest $request) {
        
        $data = $request->validated();

        $about = $this->aboutRepository->updateOrCreate($data);
        return redirect()->back()->with($about ? "success" : "error", true);
    }
}
