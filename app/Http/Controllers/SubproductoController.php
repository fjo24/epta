<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subfamilia;
use App\Familia;
use App\Imagen;
use App\Http\Requests\SubproductoRequest;

class SubproductoController extends Controller
{
    public function index(Request $request)
    {
        $familia  = Familia::all();
        $subfamilia = Subfamilia::orderBy('id_familia','ASC')->paginate(5);
        return view('adm.control.subfamilia.ListaSubfamilia')
        ->with('familias',$familia)
        ->with('subfamilias',$subfamilia);
    }
    public function create()
    {
    	$producto  = Familia::all();
        return view('adm.control.subfamilia.CrearSubfamilia')
        ->with('familias',$producto);
    } 
    public function store(SubproductoRequest $request)
    {
        $producto = new Subfamilia();
        $id = Subfamilia::all()->max('id');
        $producto->nombre_es= ucfirst(trans($request->nombre_es));
        $producto->nombre_en= ucfirst(trans($request->nombre_en));
        $producto->nombre_pt= ucfirst(trans($request->nombre_pt));
        $producto->id_familia=$request->id_familia;
        $producto->orden=$request->orden;
        $id++;
        if ($request->hasFile('imagen_destacada')) {
            if ($request->file('imagen_destacada')->isValid()) {
                $file = $request->file('imagen_destacada');
                $path = public_path('img/familia/');
                $request->file('imagen_destacada')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->imagen_destacada = 'img/familia/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $producto->save();
        flash('Se ha registrado '. $producto->nombre_es . ' de forma exitosa')->success()->important();
        return redirect()->route('subproductos.index');
        
    }
    public function edit($id)
    {
        $subproducto = Subfamilia::find($id);
        return view('adm.control.subfamilia.EditarSubfamilia')
            ->with('subproducto',$subproducto);   
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $producto = Subfamilia::find($id);
        $id = Subfamilia::all()->max('id');
        $producto->nombre_es = $request->nombre_es;
        $producto->nombre_en = $request->nombre_en;
        $producto->nombre_pt = $request->nombre_pt;
        $producto->orden=$request->orden;
        $id++;
        if ($request->hasFile('imagen_destacada')) {
            if ($request->file('imagen_destacada')->isValid()) {
                $file = $request->file('imagen_destacada');
                $path = public_path('img/familia/');
                $request->file('imagen_destacada')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->imagen_destacada = 'img/familia/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $producto->save();
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('subproductos.index');
    }

    public function destroy($id)
    {
        $subproducto= Subfamilia::find($id);
        $subproducto -> delete();
        flash('Se ha eliminado correctamente.')->success()->important();
        return redirect()->route('subproductos.index');
    }
}
