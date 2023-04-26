<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ContactMeRepositoryInterface;
use Illuminate\Http\Request;

class ContactMeController extends Controller
{
    protected $contactMeRepository;

    public function __construct(ContactMeRepositoryInterface $contactMeRepository) {
        $this->contactMeRepository = $contactMeRepository;
    }

    public function index() {
        $contactMe = $this->contactMeRepository->all();
        return view('admin.contactMe.index', compact('contactMe'));
    }
}
