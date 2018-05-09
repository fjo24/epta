<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Descarga;
use App\Http\Requests\DescargaRequest;

class DescargaController extends Controller
{
    public function index()
    {
        $descarga = Descarga::all();
        return view('adm.control.descarga.ListaDescarga')
        ->with('descargas',$descarga);
    }
    public function create()
    {
        return view('adm.control.descarga.CrearDescarga');
    } 
    public function store(DescargaRequest $request)
    {
        $servicio = new Descarga();
        $servicio->nombre_es= ucfirst(trans($request->nombre_es));
        $servicio->nombre_en= ucfirst(trans($request->nombre_en));
        $servicio->nombre_pt= ucfirst(trans($request->nombre_pt));
        $servicio->orden = $request->orden;
        $id = Descarga::all()->max('id');
        $id++;
        if ($request->hasFile('ficha_es')) {
            if ($request->file('ficha_es')->isValid()) {
                $file = $request->file('ficha_es');
                $path = public_path('img/ficha_documento/');
                $request->file('ficha_es')->move($path, $id.'_'.$file->getClientOriginalName());
                $servicio->ficha_es = 'img/ficha_documento/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('ficha_en')) {
            if ($request->file('ficha_en')->isValid()) {
                $file = $request->file('ficha_en');
                $path = public_path('img/ficha_documento/');
                $request->file('ficha_en')->move($path, $id.'_'.$file->getClientOriginalName());
                $servicio->ficha_en = 'img/ficha_documento/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('ficha_pt')) {
            if ($request->file('ficha_pt')->isValid()) {
                $file = $request->file('ficha_pt');
                $path = public_path('img/ficha_documento/');
                $request->file('ficha_pt')->move($path, $id.'_'.$file->getClientOriginalName());
                $servicio->ficha_pt = 'img/ficha_documento/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $servicio->save();
        flash('Se ha creado de forma exitosa')->success()->important();
        return redirect()->route('descargas.index');
    }
    public function edit($id)
    {
        $servicio = Descarga::find($id);
        return view('adm.control.descarga.EditarDescarga')
            ->with('descarga',$servicio);   
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $servicio = Descarga::find($id);
        $servicio->nombre_es= ucfirst(trans($request->nombre_es));
        $servicio->nombre_en= ucfirst(trans($request->nombre_en));
        $servicio->nombre_pt= ucfirst(trans($request->nombre_pt));
        $servicio->orden = $request->orden;
        $id = Descarga::all()->max('id');
        $id++;
        if ($request->hasFile('ficha_es')) {
            if ($request->file('ficha_es')->isValid()) {
                $file = $request->file('ficha_es');
                $path = public_path('img/ficha_documento/');
                $request->file('ficha_es')->move($path, $id.'_'.$file->getClientOriginalName());
                $servicio->ficha_es = 'img/ficha_documento/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('ficha_en')) {
            if ($request->file('ficha_en')->isValid()) {
                $file = $request->file('ficha_en');
                $path = public_path('img/ficha_documento/');
                $request->file('ficha_en')->move($path, $id.'_'.$file->getClientOriginalName());
                $servicio->ficha_en = 'img/ficha_documento/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('ficha_pt')) {
            if ($request->file('ficha_pt')->isValid()) {
                $file = $request->file('ficha_pt');
                $path = public_path('img/ficha_documento/');
                $request->file('ficha_pt')->move($path, $id.'_'.$file->getClientOriginalName());
                $servicio->ficha_pt = 'img/ficha_documento/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $servicio->save();
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('descargas.index');
    }
    public function destroy($id)
    {
        $descarga= Descarga::find($id);
        $descarga -> delete();
        flash('Se ha eliminado correctamente.')->success()->important();
        return redirect()->route('descargas.index');
    }
}
