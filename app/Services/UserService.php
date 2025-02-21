<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;

class UserService
{
    protected $userModel;

    public function __construct(User $userModel) 
    {
        $this->userModel = $userModel;
    }

    public function login($email, $password, Request $request)
    {
        $result = Auth::attempt(['email' => $email, 'password' => $password]);

        if ($result) {
            $request->session()->regenerate();

            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            cookie()->queue(cookie('auth_token', $token, 60));

            return true;
        } else {
            session()->flash('error', 'Email ou senha inválidos.');
            return false;
        }
    }

    public function show() 
    {
        return $this->userModel->newQuery();
    }
}
