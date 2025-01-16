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

<body>
    <div class="header">
        @include('header')
    </div>
    <form action="{{ route('verdura.guardar') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text"
                class="form-control @error('nombre') is-invalid @enderror"
                id="nombre" name="nombre" value="{{ old('nombre') }}" />
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="precioPorKg" class="form-label">Precio por KG</label>
            <input type="text"
                class="form-control @error('precioPorKg') is-invalid @enderror"
                id="precioPorKg" placeholder="0000.00" name="precioPorKg" value="{{ old('precioPorKg') }}" />
            @error('precioPorKg')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="stock" id="stock"
                        value="1" {{ old('stock') ? 'checked' : '' }}>
                    <label class="form-check-label" for="stock">
                        Stock
                    </label>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
    <div class="footer mt-auto">
        @include('footer')
    </div>
</body>
</html>