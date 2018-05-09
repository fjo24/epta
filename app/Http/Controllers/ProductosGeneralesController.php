<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Familia;
use App\Subproducto;
use App\Imagen;
use App\Http\Requests\GeneralRequest;
use App\Http\Requests\UpdateGnrlRequest;

class ProductosGeneralesController extends Controller
{
    public function index(Request $request)
    {
        $familia  = Familia::all();
        return view('adm.control.familia.ListaFamilia')
        ->with('familias',$familia);
    }
    public function create()
    {
        return view('adm.control.familia.CrearFamilia');
    } 
    public function store(GeneralRequest $request)
    {
        $producto = new Familia();
        $id = Familia::all()->max('id');
        $producto->nombre_es= ucfirst(trans($request->nombre_es));
        $producto->nombre_en= ucfirst(trans($request->nombre_en));
        $producto->nombre_pt= ucfirst(trans($request->nombre_pt));
        $producto->orden = $request->orden;
        $producto->save();
        flash('Se ha registrado '. $producto->nombre_es . ' de forma exitosa')->success()->important();
        return redirect()->route('productos.index');
        
    }
    public function edit($id)
    {
        $producto = Familia::find($id);
        return view('adm.control.familia.EditarFamilia')
            ->with('familia',$producto);   
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $producto = Familia::find($id);
        $producto->nombre_es = ucfirst(trans($request->nombre_es));
        $producto->nombre_en = ucfirst(trans($request->nombre_en));
        $producto->nombre_pt = ucfirst(trans($request->nombre_pt));
        $producto->orden = $request->orden;
        $producto->save();
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('productos.index');
    }

    public function destroy($id)
    {
        $producto= Familia::find($id);
        $producto -> delete();
        return redirect()->route('productos.index');
    }
}
