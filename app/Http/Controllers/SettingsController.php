<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\Repositories\Contracts\GeneralRepositoryInterface;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    protected $generalRepository;

    public function __construct(GeneralRepositoryInterface $generalRepository)
    {
        $this->generalRepository = $generalRepository;
    }

    public function index() {
        return view('admin.settings.create');
    }

    public function updateOrCreate(SettingsRequest $request) {
        
        $data = $request->validated();

        $settings = $this->generalRepository->updateOrCreate($data);
        dd($settings);
    }
}
