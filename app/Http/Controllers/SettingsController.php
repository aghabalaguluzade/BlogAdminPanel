<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\Repositories\Contracts\SettingsRepositoryInterface;

class SettingsController extends Controller
{
    protected $settingsRepository;

    public function __construct(SettingsRepositoryInterface $settingsRepository)
    {
        $this->settingsRepository = $settingsRepository;
    }

    public function index() {
        $settings = $this->settingsRepository->all()->first();
        return view('admin.settings.create', compact('settings'));
    }

    public function updateOrCreate(SettingsRequest $request) {
        
        $data = $request->validated();

        $settings = $this->settingsRepository->updateOrCreate($data);

        return redirect()->back()->with($settings ? 'success' : 'error',true);
    }
}
