<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Urbanist', sans-serif;
            color: white;
        }

        .application-body {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            min-height: 100vh;
        }

        .page-controller {
            position: relative;
            width: 15%;
            min-height: 100vh;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color:rgb(17, 31, 56);
        }

        .page-controller > button {
            margin-top: 2rem;
            width: 100%;
            padding: 1rem;
            text-decoration: none;
            border: none;
            color: white;
            background-color: rgb(17, 31, 56);
            border-radius: 5px;
            transition: .5s;
        }

        .page-controller > button:hover {
            background-color: white;
            color: black;
        }

        .pages {
            position: relative;
            width: 85%;
            min-height: 100vh;
            padding: 2rem;
            background-color:rgb(173, 173, 173);
        }
    </style>

    @livewireStyles
</head>
<body>
    <div class="application-body">
        <div class="page-controller">
            <h1>Dashboard</h1>
            <button> Dashboard </button>
            <button> Relatórios </button>
            <button> Auditoria </button>
            <button> Configurações </button>
        </div>
        <div class="pages">
            @livewire('page-controller')
        </div>
    </div>

    @stack('scripts')

    @livewireScripts
</body>
</html>