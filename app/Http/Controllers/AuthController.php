<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function loginIndex() {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|max:255|email:rfc,dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only(['email', 'password']),$request->remember_token)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'Daxil olunan email səhvdir.',
            'password' => "Daxil olunan şifrə səhvdir"
        ])->onlyInput('email','password');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('login');
    }

    public function profile()
    {
        $user = $this->userRepository->find(auth()->id());
        return view('admin.auth.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $data = $request->validate([
            'name' => ['string', 'max:255'],
            'password' => ['nullable', 'string'],
            'email' => ['string', 'email', 'max:255', 'unique:users,email,'.auth()->id()],
            'new_password' => ['nullable', 'string', 'min:7',],
            'repeat_password' => ['same:new_password']
        ]);

        $profile = $this->userRepository->updateProfile(Auth::user()->id, $data);

        return redirect()->route('profile')->with($profile  ? "success" : "error", true);
    }

}