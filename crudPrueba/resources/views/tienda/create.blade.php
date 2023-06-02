@extends('layouts.app')

@section('content')
    <div class="shadow-sm p-3 mb-5 bg-white rounded w-50 m-auto">
        <h2 class="text-center mb-5">Crear tienda</h2>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                Todos los campos son obligatorios
            </div>
        @endif
        <form action="{{ route('tienda.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
                <label for="fechaApertura" class="form-label">Fecha de apertura <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="fechaApertura">
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('tienda.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection
