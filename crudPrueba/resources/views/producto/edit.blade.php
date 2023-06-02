@extends('layouts.app')

@section('content')
    <div class="shadow-sm p-3 mb-5 bg-white rounded w-50 m-auto">
        <h2 class="text-center mb-5">Crear tienda</h2>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                Todos los campos son obligatorios
            </div>
        @endif
        <form action="{{ route('producto.update', $producto) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}">
                @error('nombre')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="sku" class="form-label">sku <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="sku" value="{{ $producto->nombre }}">
                @error('sku')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion <span class="text-danger">*</span></label>
                <textarea class="form-control" name="descripcion"> {{ $producto->descripcion }}</textarea>
                @error('descripcion')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor <span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="valor" value="{{ $producto->valor }}" />
                @error('valor')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-3">
                <label for="tienda_id" class="form-label">Tienda <span class="text-danger">*</span></label>
                <select class="form-control" name="tienda_id">
                    @foreach ($tiendas as $tienda)
                        <option value="{{ $tienda->id }}" @selected($tienda->id === $producto->tienda_id)>{{ $tienda->nombre }}</option>
                    @endForeach
                </select>
                @error('tienda_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Nueva Imagen </label>
                <input type="file" class="form-control" name="imagen" />
                <div class="d-flex justify-content-center ">
                    <img src="{{ asset('storage/' . $producto->imagen) }}" class="img-fluid mt-5"
                        style="width: 250px; height: 150px" alt="Imagen del producto">
                </div>
            </div>
            <div class="d-flex justify-content-between mt-5">
                <a href="{{ route('producto.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
