<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dato;
class DatoController extends Controller
{
    public function index(Request $request)
    {
        $dato  = dato::orderBy('id','ASC')->get();
    	return view('adm.control.datos_empresa.ListaDatos')
        ->with('datos',$dato);
    }
    public function create()
    {
        
    } 
    public function store(Request $request)
    {
        
    }
    public function edit($id)
    {
        $dato = dato::find($id);
        return view('adm.control.datos_empresa.EditarDatos')
            ->with('datos',$dato);
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $dato=dato::find($id);
        $dato->descripcion=$request->descripcion;
        
        $dato->save();
        
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('datos.index');
    }

    public function update_datos(Request $request)
    {
        
    }

    public function destroy($id)
    {
       
    }
}
