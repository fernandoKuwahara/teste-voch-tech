<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Urbanist', sans-serif;
            }

            .body-page {
                display: flex;
                justify-content: space-evenly;
                align-items: center;
                min-height: 100vh;
            }

            .form-body {
                position: relative;
                height: 30rem;
                width: 20rem;
                display: flex;
                flex-direction: column;
                border-radius: 5px;
                padding: 1rem;
                background-color: #e4e4e4;
                box-shadow: 5px 5px 10px rgba(224, 224, 224, 0.69);
            }

            .form-title {
                padding: 1rem;
                width: 100%;
            }

            .form {
                width: 100%;
                height: 100%;
                padding: 4rem 1.5rem 0 1.2rem;
                display: flex;
                flex-direction: column;
            }

            input {
                margin-bottom: 1rem;
                width: 100%;
            }

            button {
                float: right;
            }
        </style>

        @livewireStyles
    </head>
    <body>
        <main class="body-page">
            @livewire('login-form')
        </main>

        @livewireScripts
    </body>
</html>
