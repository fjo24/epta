<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Metadato;

class MetadatoController extends Controller
{
    public function index(Request $request)
    {
        $metadato  = metadato::orderBy('id','ASC')->paginate(10);
    	return view('adm.control.metadatos.ListaMetadato')
        ->with('metadatos',$metadato);
    }
    public function create()
    {
        
    } 
    public function store(Request $request)
    {
        
    }
    public function edit($id)
    {
        $metadato = metadato::find($id);
        return view('adm.control.metadatos.EditarMetadato')
            ->with('metadatos',$metadato);
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $metadato=metadato::find($id);
        $metadato->keywords=$request->keywords;
        $metadato->description=$request->description;
        
        $metadato->save();
        
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('metadatos.index');
    }

    public function destroy($id)
    {
       
    }
}
