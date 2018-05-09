<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;

class HomeController extends Controller
{
    public function index(Request $request)
    {
       $home = Home::all()->first();
        return redirect()->route('home.edit', $home->id);
    }
    public function create()
    {
        
    } 
    public function store(Request $request)
    {
        
    }
    public function edit($id)
    {
        $home = Home::find($id);
        return view('adm.control.home.EditarHome')
            ->with('home',$home);
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $dato=Home::find($id);
        $dato->titulo_es=$request->titulo_es;
        $dato->titulo_en=$request->titulo_en;
        $dato->titulo_pt=$request->titulo_pt;
        $dato->subtitulo_es=$request->subtitulo_es;
        $dato->subtitulo_en=$request->subtitulo_en;
        $dato->subtitulo_pt=$request->subtitulo_pt;
        $dato->contenido_es=$request->contenido_es;
        $dato->contenido_en=$request->contenido_en;
        $dato->contenido_pt=$request->contenido_pt;
        $dato->link=$request->link;
        $dato->save();
        
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('home.index');
    }

    public function destroy($id)
    {
       
    }
}

