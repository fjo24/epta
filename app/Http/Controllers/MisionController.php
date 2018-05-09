<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mision;

class MisionController extends Controller
{
    public function index()
    {
    	$mision = Mision::all()->first();

        return redirect()->route('mision.edit', $mision->id);
    }
    public function create()
    {

    } 
    public function store(Request $request)
    {
    }
    public function edit($id)
    {
        $mision = Mision::find($id);
        return view('adm.control.mision.EditarMision')
            ->with('mision',$mision);
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $contenido=Mision::find($id);
        $id = Mision::all()->max('id');
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
        $contenido->save();
        
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('mision.index');
    }

    public function destroy($id)
    {
    }
}
