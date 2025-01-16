<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/js/app.js'])


    <title>Document</title>
</head>


<body class="min-vh-100 d-flex flex-column">
    <div class="header">
        @include('header')
    </div>

        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col">
                    <h1 class="float-start">Verduras</h1>
                    <a class="btn btn-primary float-end" href={{route('verdura.nuevo')}}>Nuevo</a>
                </div>
            </div>
    </div>

    <div class="tabla-index">
        <div class="table-responsive overflow-visible">
            <table class="table table-striped table-hover align-middle">
                <thead class="sticky-top">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio por KG</th>
                        <th scope="col">Stock</th>
                        <th scope="col" class="text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($verduras as $verdura)
                        <tr>
                            <td>{{ $verdura->id }}</td>
                            <td>{{ $verdura->nombre }}</td>
                            <td>{{ $verdura->precioPorKg }}</td>
                            <td>{{ $verdura->stock ? 'Si' : 'No'}}</td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <button class="btn btn-secondary" type="button" id="dropdownMenu2"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <a class="dropdown-item" href="{{ route('verdura.editar', $verdura->id) }}">Editar</a>
                                        <a class="dropdown-item" href="{{ route('verdura.cambiarEstado', $verdura->id) }}">
                                            {{ $verdura->stock == 1 ? 'Desactivar' : 'Activar' }}
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer mt-auto">
        @include('footer')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

