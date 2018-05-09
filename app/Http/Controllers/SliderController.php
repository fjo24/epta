<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Http\Requests\SliderRequest;

class SliderController extends Controller
{
	public function index(Request $request)
    {
        $seccion = "home";
        $slider  = Slider::orderBy('seccion','ASC')->paginate(7);
    	return view('adm.control.Sliders.ListaSlider')
        ->with('sliders',$slider)
        ->with('seccion', $seccion);
    }
    public function index_producto(Request $request)
    {
        $seccion = "calidad";
        $slider  = Slider::orderBy('seccion','ASC')->paginate(7);
        return view('adm.control.Sliders.ListaSlider')
        ->with('sliders',$slider)
        ->with('seccion', $seccion);
    }
    public function create()
    {
        $seccion = "home";
        return view('adm.control.Sliders.CrearSlider')
        ->with('seccion', $seccion);
    } 
    public function create_producto(){
        $seccion = "producto";
        return view('adm.control.Sliders.CrearSlider')
        ->with('seccion', $seccion);
    }
    public function store(SliderRequest $request)
    {
     	$slider = new Slider();
        $slider->texto_es = $request->texto_es;
        $slider->texto_en = $request->texto_en;
        $slider->texto_pt = $request->texto_pt;
        $slider->subtitulo_es=$request->subtitulo_es;
        $slider->subtitulo_en=$request->subtitulo_en;
        $slider->subtitulo_pt=$request->subtitulo_pt;
        $slider->orden = $request->orden;
        $slider->seccion = $request->seccion;
     	$id = Slider::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/slider/');
                $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                $slider->imagen = 'img/slider/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $slider->save();
        flash('Se ha registrado de forma exitosa')->success()->important();
        
        if($request->seccion == "home"){
            return redirect()->route('sliders.index');
        }
        else{
            if($request->seccion == "producto"){
                return redirect()->route('sliders.index_producto');
            }
        }
        
    }
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('adm.control.Sliders.EditarSlider')
            ->with('slider',$slider);
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $slider=Slider::find($id);
        $id = Slider::all()->max('id');
        $slider->texto_es=$request->texto_es;
        $slider->texto_en=$request->texto_en;
        $slider->texto_pt=$request->texto_pt;
        $slider->subtitulo_es=$request->subtitulo_es;
        $slider->subtitulo_en=$request->subtitulo_en;
        $slider->subtitulo_pt=$request->subtitulo_pt;
        $slider->orden = $request->orden;
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/slider/');
                $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                $slider->imagen = 'img/slider/' . $id.'_'.$file->getClientOriginalName();
            }
        }
        $seccion=$request->seccion;
        $slider->save();
        flash('Se ha actualizado de forma exitosa')->success()->important();
        if($seccion === 'home'){
            return redirect()->route('sliders.index');
        }
        else{
            return redirect()->route('sliders.index_producto');
        }
    }

    public function destroy($id)
    {
        $slider= Slider::find($id);
        $slider -> delete();
        flash('Se ha eliminado correctamente.')->success()->important();
        if($slider->seccion === 'home'){
            return redirect()->route('sliders.index');
        }
        else{
            if($slider->seccion === 'producto'){
                return redirect()->route('sliders.index_producto');
            }
        }
    }
}
