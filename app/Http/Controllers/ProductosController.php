<?php

namespace App\Http\Controllers;


use App\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;

class ProductosController extends Controller

{
    public function index(Request $request)
    {
        $producto  = producto::orderBy('orden','ASC')->paginate(5);
    	return view('adm.control.productos.ListaProductos')
        ->with('productos',$producto);
    }
    public function create()
    {
        
    } 
    public function store(Request $request)
    {
        
    }
    public function edit($id)
    {
        $producto = producto::find($id);
        return view('adm.control.productos.EditarProductos')
            ->with('productos',$producto);
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $producto = producto::find($id);
        $id = producto::all()->max('id');
        $producto->orden = $request->orden;
        $producto->link = $request->link;
        $producto->nombre_es = ucfirst(trans($request->nombre_es));
        $producto->nombre_en = ucfirst(trans($request->nombre_en));
        $producto->nombre_pt = ucfirst(trans($request->nombre_pt));
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/productos/');
                $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->imagen = 'img/productos/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $producto->save();
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('productos-destacados.index');
    }

    public function destroy($id)
    {
       
    }
}
