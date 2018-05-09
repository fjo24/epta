<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nuestra;
use App\Http\Requests\ContenidoRequest;

class ContenidoController extends Controller
{
    public function index()
    {
    	$contenido = Nuestra::all()->first();

        return redirect()->route('contenido.edit', $contenido->id);
    }
    public function create()
    {

    } 
    public function store(Request $request)
    {
    }
    public function edit($id)
    {
        $contenido = Nuestra::find($id);
        return view('adm.control.empresa.EditarContenido')
            ->with('contenido',$contenido);
    }
    public function show($id)
    {
        
    }

    public function update(ContenidoRequest $request, $id)
    {
        $contenido=Nuestra::find($id);
        $id = Nuestra::all()->max('id');
        $contenido->titulo_es= ucfirst(trans($request->titulo_es));
        $contenido->titulo_en= ucfirst(trans($request->titulo_en));
        $contenido->titulo_pt= ucfirst(trans($request->titulo_pt));
        $contenido->contenido_es=$request->contenido_es;
        $contenido->contenido_en=$request->contenido_en;
        $contenido->contenido_pt=$request->contenido_pt;
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/nuestra/');
                $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                $contenido->imagen = 'img/nuestra/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('imagen_cabecera')) {
            if ($request->file('imagen_cabecera')->isValid()) {
                $file = $request->file('imagen_cabecera');
                $path = public_path('img/nuestra/');
                $request->file('imagen_cabecera')->move($path, $id.'_'.$file->getClientOriginalName());
                $contenido->imagen_cabecera = 'img/nuestra/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $contenido->save();
        
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('contenido.index');
    }

    public function destroy($id)
    {
    }
}
