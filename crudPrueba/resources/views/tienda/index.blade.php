@extends('layouts.app')

@section('content')
    <div class="shadow-sm p-3 mb-10 bg-white rounded">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Tiendas</h1>
            <a href="{{ route('tienda.create') }}" class="btn btn-success">Nueva Tienda</a>
        </div>

        @if (Session::get('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table  table-striped " id="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha De Apertura</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiendas as $tienda)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $tienda->nombre }}</td>
                        <td>{{ \Carbon\Carbon::parse($tienda->fechaApertura)->format('d-m-Y') }}</td>
                        <td class="d-flex justify-content-evenly align-items-center">
                            <a href="{{ route('tienda.edit', $tienda) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('tienda.destroy', $tienda) }}"  method="POST" class="mt-3 eliminar">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
@endsection

@section('scripts')
    <script>
        document.querySelectorAll('.eliminar').forEach(element => {
            element.addEventListener('submit', e => {
            e.preventDefault();
            Swal.fire({
                title: '¿Seguro de eliminar?',
                text: "Registro eliminado no se puede recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    element.submit();
                }
            })
        });
        });
    </script>
@endsection
