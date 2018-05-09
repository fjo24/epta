<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calidad;

class CalidadController extends Controller
{
    public function index(Request $request)
    {
        $calidad  = Calidad::all()->first();
        return redirect()->route('calidad.edit',$calidad->id);
    }
    public function create()
    {
        
    } 
    public function store(Request $request)
    {
        
    }
    public function edit($id)
    {
        $calidad = Calidad::find($id);
        return view('adm.control.calidad.EditarCalidad')
            ->with('calidad',$calidad);
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $calidad=Calidad::find($id);
        $calidad->contenido_es=$request->contenido_es;
        $calidad->contenido_en=$request->contenido_en;
        $calidad->contenido_pt=$request->contenido_pt;
        $calidad->titulo_es=$request->titulo_es;
        $calidad->titulo_en=$request->titulo_en;
        $calidad->titulo_pt=$request->titulo_pt;

        $id = Calidad::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/calidad/');
                $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                $calidad->imagen = 'img/calidad/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('icono1')) {
            if ($request->file('icono1')->isValid()) {
                $file = $request->file('icono1');
                $path = public_path('img/calidad/');
                $request->file('icono1')->move($path, $id.'_'.$file->getClientOriginalName());
                $calidad->icono1 = 'img/calidad/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('icono2')) {
            if ($request->file('icono2')->isValid()) {
                $file = $request->file('icono2');
                $path = public_path('img/calidad/');
                $request->file('icono2')->move($path, $id.'_'.$file->getClientOriginalName());
                $calidad->icono2 = 'img/calidad/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $calidad->save();
        
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('calidad.index');
    }

    public function destroy($id)
    {
       
    }
}
