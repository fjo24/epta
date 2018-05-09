<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DescargaCalidad;
use App\Http\Requests\DescargaRequest;

class DescargaCalidadController extends Controller
{
    public function index()
    {
        $descarga = DescargaCalidad::all();
        return view('adm.control.calidad.ListaDescargaCalidad')
        ->with('descargas',$descarga);
    }
    public function create()
    {
        return view('adm.control.calidad.CrearDescargaCalidad');
    } 
    public function store(DescargaRequest $request)
    {
        $servicio = new DescargaCalidad();
        $servicio->nombre_es= ucfirst(trans($request->nombre_es));
        $servicio->nombre_en= ucfirst(trans($request->nombre_en));
        $servicio->nombre_pt= ucfirst(trans($request->nombre_pt));
        $servicio->orden = $request->orden;
        $id = DescargaCalidad::all()->max('id');
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
        return redirect()->route('calidad_descarga.index');
    }
    public function edit($id)
    {
        $servicio = DescargaCalidad::find($id);
        return view('adm.control.calidad.EditarDescargaCalidad')
            ->with('descarga',$servicio);   
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $servicio = DescargaCalidad::find($id);
        $servicio->nombre_es= ucfirst(trans($request->nombre_es));
        $servicio->nombre_en= ucfirst(trans($request->nombre_en));
        $servicio->nombre_pt= ucfirst(trans($request->nombre_pt));
        $servicio->orden = $request->orden;
        $id = DescargaCalidad::all()->max('id');
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
        return redirect()->route('calidad_descarga.index');
    }
    public function destroy($id)
    {
        $descarga= DescargaCalidad::find($id);
        $descarga -> delete();
        flash('Se ha eliminado correctamente.')->success()->important();
        return redirect()->route('calidad_descarga.index');
    }
}
