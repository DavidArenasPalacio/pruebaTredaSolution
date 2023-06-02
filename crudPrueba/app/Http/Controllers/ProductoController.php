<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Tienda;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{

    public function index(): View
    {
        //Consutar los productos cons tus tiendas asociadas
        $productos = Producto::select('productos.*', 'tiendas.nombre as tienda')
            ->join('tiendas', 'tiendas.id', '=', 'productos.tienda_id')
            ->get();

        return view('producto.index', ['productos' => $productos]);
    }


    public function create(): View
    {
        //Consultar todas las tiendas
        $tiendas = Tienda::all();

        return view('producto.create', ['tiendas' => $tiendas]);
    }


    public function store(Request $request): RedirectResponse
    {
        //Validación
        $request->validate([
            'nombre' => 'required|max:150',
            'sku' => 'required|unique:productos',
            'descripcion' => 'required',
            'tienda_id' => 'required',
            'valor' => 'required|regex:/^\d+$/',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Obtener la imagen del formulario
        $imagen = $request->file('imagen');

        // Guardar la imagen en el almacenamiento
        $ruta = $imagen->store('uploads', 'public');
        // Crear un nuevo producto en la base de datosu
        Producto::create([
            'nombre' => $request->nombre,
            'sku' => $request->sku,
            'descripcion' => $request->descripcion,
            'tienda_id' => $request->tienda_id,
            'valor' => $request->valor,
            'imagen' => $ruta
        ]);

        return redirect()->route('producto.index')->with('success', 'Producto creado exitosamente!');
    }



    public function edit(Producto $producto): View
    {
        //Consultar todas las tiendas
        $tiendas = Tienda::all();
        return view('producto.edit', ['producto' => $producto, 'tiendas' => $tiendas]);
    }


    public function update(Request $request, Producto $producto)
    {
        //
        // Validación de los datos del formulario
        $request->validate([
            'nombre' => 'required|max:150',
            'sku' => 'required|unique:productos,sku,' . $producto->id,
            'descripcion' => 'required',
            'tienda_id' => 'required',
            'valor' => 'required|regex:/^\d+$/',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Actualizar los atributos del producto
        $producto->nombre = $request->nombre;
        $producto->sku = $request->sku;
        $producto->descripcion = $request->descripcion;
        $producto->tienda_id = $request->tienda_id;
        $producto->valor = $request->valor;
        //Verificar si se proporciono una nueva imagen
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($producto->imagen && Storage::disk('public')->exists($producto->imagen)) {
                Storage::disk('public')->delete($producto->imagen);
            }

            //Guardar la imagen
            $imagen = $request->file('imagen');

            $ruta = $imagen->store('uploads', 'public');
            $producto->imagen = $ruta;
        }

         // Guardar los cambios en la base de datos
        $producto->save();

        return redirect()->route('producto.index')->with('success', 'Producto actualizado exitosamente');
    }

    public function destroy(Producto $producto)
    {
        // Eliminar la imagen del producto
        Storage::disk('public')->delete($producto->imagen);

        // Eliminar el producto
        $producto->delete();

        return redirect()->route('producto.index')->with('success', 'Producto eliminado exitosamente!');
    }
}
