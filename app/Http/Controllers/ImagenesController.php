<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subproducto;
use App\Producto_general;
use App\Http\Requests\GaleriaRequest;
use App\Imagen;
use App\General;

class ImagenesController extends Controller
{
    
    public function index()
    {
    }
    public function index_galeria($id)
    {
        $imagen = Imagen::orderBy('orden','ASC')->where('id_generales',$id)->paginate(5);
        $general = General::where('id',$id)->first();
        return view('adm.control.general.ListaGaleria')
        ->with('imagenes', $imagen)
        ->with('general',$general);
    }
    public function create()
    {
       
    }
    public function create_galeria($id)
    {
        $general  = General::where('id',$id)->first();
        return view('adm.control.general.CrearGaleria')
        ->with('general',$general);
    }

    public function store(GaleriaRequest $request)
    {
        $imagen = new Imagen();
        $id = Imagen::all()->max('id');
        $imagen->id_generales = $request->id_generales;
        $imagen->imagen = $request->imagen;
        $imagen->orden = $request->orden;
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/galeria_productos/');
                $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                $imagen->imagen = 'img/galeria_productos/'. $id.'_'.$file->getClientOriginalName();
                $imagen->save();
            }
        }
        flash('Se ha registrado de forma exitosa')->success()->important();
        return redirect()->route('galeria.create_galeria',$request->id_generales);
        
    }
    public function edit($id)
    {
        $imagen = Imagen::where('id',$id)->first();
        return view('adm.control.general.EditarGaleria')
             ->with('imagen',$imagen);
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $imagen = Imagen::find($id);
        $id = Imagen::all()->max('id');
        $imagen->orden = $request->orden;
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/galeria_productos/');
                $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                $imagen->imagen = 'img/galeria_productos/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $imagen->save();
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('galeria.index_galeria',$request->id_generales);

    }

    public function destroy($id)
    {
        $imagen= Imagen::find($id);
        $imagen -> delete();
        flash('Se ha eliminado correctamente.')->success()->important();
        return redirect()->route('subproductos.index');
    }
}
