<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\UserService;
use Illuminate\Http\Request;

class LoginForm extends Component
{
    public $email, $password;
    public $errorMessage;

    public function login()
    {
        // Validação antes de autenticar
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Instancia o serviço de usuário
        $userService = app(UserService::class);
        $result = $userService->login($this->email, $this->password, request());

        if ($result) {
            $this->redirect('/dashboard', navigate: true);
        } else {
            $this->addError('email', 'As credenciais fornecidas estão incorretas.');
            $this->errorMessage = 'Email ou senha inválidos.';
        }
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
