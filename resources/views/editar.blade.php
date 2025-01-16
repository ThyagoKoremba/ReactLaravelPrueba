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
    <form action="{{ route('verdura.guardaredit',$verdura->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre{{$verdura->id}}" class="form-label">Nombre</label>
            <input type="text"
                class="form-control @error('nombre')" is-invalid @enderror
                id="nombre{{$verdura->id}}" name="nombre" value="{{ old('nombre', $verdura->nombre) }}"/>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="precioPorKg{{$verdura->id}}" class="form-label">Precio por KG</label>
            <input type="text"
                class="form-control @error('precioPorKg') is-invalid @enderror"
                id="precioPorKg{{$verdura->id}}" placeholder="0000.00" name="precioPorKg" value="{{ old('precioPorKg', $verdura->precioPorKg) }}" />
            @error('precioPorKg')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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