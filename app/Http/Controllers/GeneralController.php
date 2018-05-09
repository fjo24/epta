<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\General;
use App\Subfamilia;

class GeneralController extends Controller
{
    public function index(Request $request)
    {
    }
    public function index_general($id)
    {
        $general  = General::where('id_subfamilias',$id)->get();
        $subfamilia = Subfamilia::orderBy('id_familia','ASC')->paginate(5);
        return view('adm.control.general.ListaGeneral')
        ->with('generales',$general)
        ->with('subfamilias',$subfamilia);
    }
    public function create_general($id){
    	$subfamilia  = Subfamilia::find($id);
        return view('adm.control.general.CrearGeneral')
        ->with('subfamilia',$subfamilia);
    }
    public function create()
    {
    	
    } 
    public function store(Request $request)
    {
        $producto = new General();
        $id = General::all()->max('id');
        $producto->nombre_es= ucfirst(trans($request->nombre_es));
        $producto->nombre_en= ucfirst(trans($request->nombre_en));
        $producto->nombre_pt= ucfirst(trans($request->nombre_pt));
        $producto->tabla=$request->tabla;
        $producto->contenido_es= ucfirst(trans($request->contenido_es));
        $producto->contenido_en= ucfirst(trans($request->contenido_en));
        $producto->contenido_pt= ucfirst(trans($request->contenido_pt));
        $producto->id_subfamilias=$request->id_subfamilias;
        $producto->orden=$request->orden;
        $producto->codigo1=$request->codigo1;
        $producto->codigo2=$request->codigo2;
        $id++;
        if ($request->hasFile('imagen_destacada')) {
            if ($request->file('imagen_destacada')->isValid()) {
                $file = $request->file('imagen_destacada');
                $path = public_path('img/familia/');
                $request->file('imagen_destacada')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->imagen_destacada = 'img/familia/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('descarga_es')) {
            if ($request->file('descarga_es')->isValid()) {
                $file = $request->file('descarga_es');
                $path = public_path('img/descarga/');
                $request->file('descarga_es')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->descarga_es = 'img/descarga/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('descarga_en')) {
            if ($request->file('descarga_en')->isValid()) {
                $file = $request->file('descarga_en');
                $path = public_path('img/descarga/');
                $request->file('descarga_en')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->descarga_en = 'img/descarga/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('descarga_pt')) {
            if ($request->file('descarga_pt')->isValid()) {
                $file = $request->file('descarga_pt');
                $path = public_path('img/descarga/');
                $request->file('descarga_pt')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->descarga_pt = 'img/descarga/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('solucion_es')) {
            if ($request->file('solucion_es')->isValid()) {
                $file = $request->file('solucion_es');
                $path = public_path('img/descarga/');
                $request->file('solucion_es')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->solucion_es = 'img/descarga/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('solucion_en')) {
            if ($request->file('solucion_en')->isValid()) {
                $file = $request->file('solucion_en');
                $path = public_path('img/descarga/');
                $request->file('solucion_en')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->solucion_en = 'img/descarga/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('solucion_pt')) {
            if ($request->file('solucion_pt')->isValid()) {
                $file = $request->file('solucion_pt');
                $path = public_path('img/descarga/');
                $request->file('solucion_pt')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->solucion_pt = 'img/descarga/' . $id.'_'.$file->getClientOriginalName();
            }
		}
        $producto->save();
        flash('Se ha registrado '. $producto->nombre_es . ' de forma exitosa')->success()->important();
        return redirect()->route('subproductos.index');
        
    }
    public function edit($id)
    {
        $general = General::find($id);
        return view('adm.control.general.EditarGeneral')
            ->with('general',$general);   
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $producto = General::find($id);
        $id = General::all()->max('id');
        $producto->nombre_es= ucfirst(trans($request->nombre_es));
        $producto->nombre_en= ucfirst(trans($request->nombre_en));
        $producto->nombre_pt= ucfirst(trans($request->nombre_pt));
        $producto->tabla=$request->tabla;
        $producto->contenido_es= ucfirst(trans($request->contenido_es));
        $producto->contenido_en= ucfirst(trans($request->contenido_en));
        $producto->contenido_pt= ucfirst(trans($request->contenido_pt));
        $producto->id_subfamilias=$request->id_subfamilias;
        $producto->orden=$request->orden;
        $producto->codigo1=$request->codigo1;
        $producto->codigo2=$request->codigo2;
        $id++;
        if ($request->hasFile('imagen_destacada')) {
            if ($request->file('imagen_destacada')->isValid()) {
                $file = $request->file('imagen_destacada');
                $path = public_path('img/familia/');
                $request->file('imagen_destacada')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->imagen_destacada = 'img/familia/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('descarga_es')) {
            if ($request->file('descarga_es')->isValid()) {
                $file = $request->file('descarga_es');
                $path = public_path('img/descarga/');
                $request->file('descarga_es')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->descarga_es = 'img/descarga/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('descarga_en')) {
            if ($request->file('descarga_en')->isValid()) {
                $file = $request->file('descarga_en');
                $path = public_path('img/descarga/');
                $request->file('descarga_en')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->descarga_en = 'img/descarga/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('descarga_pt')) {
            if ($request->file('descarga_pt')->isValid()) {
                $file = $request->file('descarga_pt');
                $path = public_path('img/descarga/');
                $request->file('descarga_pt')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->descarga_pt = 'img/descarga/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('solucion_es')) {
            if ($request->file('solucion_es')->isValid()) {
                $file = $request->file('solucion_es');
                $path = public_path('img/descarga/');
                $request->file('solucion_es')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->solucion_es = 'img/descarga/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('solucion_en')) {
            if ($request->file('solucion_en')->isValid()) {
                $file = $request->file('solucion_en');
                $path = public_path('img/descarga/');
                $request->file('solucion_en')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->solucion_en = 'img/descarga/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        if ($request->hasFile('solucion_pt')) {
            if ($request->file('solucion_pt')->isValid()) {
                $file = $request->file('solucion_pt');
                $path = public_path('img/descarga/');
                $request->file('solucion_pt')->move($path, $id.'_'.$file->getClientOriginalName());
                $producto->solucion_pt = 'img/descarga/' . $id.'_'.$file->getClientOriginalName();
            }
		}
        $producto->save();
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('subproductos.index');
    }

    public function destroy($id)
    {
        $subproducto= General::find($id);
        $subproducto -> delete();
        flash('Se ha eliminado correctamente.')->success()->important();
        return redirect()->route('subproductos.index');
    }
}
