<div class="form-body">
    <div class="form-title">
        <h2> Fazer Login: </h2>
    </div>
    <main class="form">
        <form wire:submit.prevent="login">
            <div class="form-floating">
                <input type="email" class="form-control" wire:model="email" placeholder="name@example.com">
                <label for="emailInput">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" wire:model="password" placeholder="password">
                <label for="passwordInput">Senha</label>
            </div>
            <button class="btn btn-primary w-100 py-2" style="margin-top: 2.5rem;" type="submit">Fazer Login</button>
        </form>
    </main>

    @if ($errorMessage)
        <div class="alert alert-danger">
            {{ $errorMessage }}
        </div>
    @endif
</div>
