<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Repositories\Contracts\ContactRepositoryInterface;

class ContactController extends Controller
{
    protected $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository) {
        $this->contactRepository = $contactRepository;
    }

    public function index() {

        $settings = $this->contactRepository->getSettings();
        return view('contact', compact('settings'));
    }

    public function store(ContactRequest $request) {
        
        $contact = $this->contactRepository->create($request->validated());
        
        return redirect()->back()->with($contact ? 'success' : 'error', true);
    }
}
