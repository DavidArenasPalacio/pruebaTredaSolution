<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TiendaController extends Controller
{

    public function index(): View
    {
        //Consultar todas las tiendas
        $tiendas  = Tienda::all();
        return view('tienda.index', ['tiendas' => $tiendas]);
    }

    public function create(): View
    {
        //Vista para crear Tienda
        return view('tienda.create');
    }


    public function store(Request $request): RedirectResponse
    {
        //Validación    
        $request->validate([
            'nombre' => 'required|max:100',
            'fechaApertura' => 'required',
        ]);

        // Crear un nueva nuevo tienda en la base de datos

        Tienda::create($request->all());

        return redirect()->route('tienda.index')->with('success', 'Tienda creada exitosamente!');
    }


    public function edit(Tienda $tienda): View
    {
        //
        return view('tienda.edit', ['tienda' => $tienda]);
    }


    public function update(Request $request, Tienda $tienda): RedirectResponse
    {
        //
        //Validación    
        $request->validate([
            'nombre' => 'required|max:100',
            'fechaApertura' => 'required',
        ]);

        // actualiza la informacon
        $tienda->update($request->all());

        return redirect()->route('tienda.index')->with('success', 'Tienda actuazalida exitosamente!');
    }


    public function destroy(Tienda $tienda)
    {
        //Elimina la tienda
        $tienda->delete();

        return redirect()->route('tienda.index')->with('success', 'Tienda eliminada exitosamente!');
    }
}
