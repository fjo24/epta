<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Producto;
use App\Nuestra;
use App\Producto_general;
use App\Subproducto;
use App\Imagen;
use App\Metadato;
use App\Servicio;
use App\Calidad;
use App\Subfamilia;
use App\Home;
use App\Mision;
use App\Dato;
use App\General;
use App\Descarga;
use App\Familia;
use App\DescargaCalidad;
use App\Http\Requests\Contacto;
use App\Http\Requests\ContactoRequest;
use App\Mail\sendmail;
use Mail;

class PaginasController extends Controller
{
	public function index(){
        $metadato= metadato::where('seccion','home')->first();
        $home = Home::all()->first();
        $slider= slider::where('seccion','home')->orderBy('orden','ASC')->get();
        $producto= producto::all();
        $familia = Familia::orderBy('orden','ASC')->get();
        return view('pages.home',[
            'sliders' => $slider,
            'home' => $home,
            'productos' => $producto,
            'metadatos' => $metadato,
            'familias' => $familia
        ]);
	}
    public function empresa(Request $request)
    {
    	$metadato= metadato::where('seccion','empresa')->first();
        $nuestra_empresa = Nuestra::all()->first();
        $mision = Mision::all()->first();
        $familia = Familia::orderBy('orden','ASC')->get();
    	return view('pages.empresa',[
            'metadatos' => $metadato,
            'nuestra' => $nuestra_empresa,
            'mision' => $mision,
            'familias' => $familia
        ]);
    }
    public function producto($id)
    {
        $subfamilia= Subfamilia::where('id_familia',$id)->get();

        $nombre= Familia::where('id',$id)->first();
        $metadato= metadato::where('seccion','producto')->first();
        
        $familia = Familia::orderBy('orden','ASC')->get();
        
        
        return view('pages.producto',[
            'metadatos' => $metadato,
            'familias' => $familia,
            'subfamilias' => $subfamilia,
            'nombre' => $nombre
        ]);

    }
    public function subproducto($id){
        $metadato= metadato::where('seccion','producto')->first();
        $familia = Familia::orderBy('orden','ASC')->get();
        $seleccionada= Subfamilia::where('id',$id)->first();
        $subfamilia= Subfamilia::where('id_familia',$seleccionada->id_familia)->get();
        $producto = Subfamilia::orderBy('orden','ASC')->get();
        return view('pages.subproducto',[
            'metadatos' => $metadato,
            'familias' => $familia,
            'productos' => $producto,
            'subfamilias' => $subfamilia,
            'seleccionada' => $seleccionada
        ]);
    }
    public function subgaleria($id){
        
        $metadato= Metadato::where('seccion','producto')->first();
        $producto = General::find($id);
        $familia = Familia::orderBy('orden','ASC')->get();
        $subfamilia = Subfamilia::where('id',$producto->id_subfamilias)->first();
        $familia2 = Familia::where('id',$subfamilia->id_familia)->first();
        $imagen = Imagen::orderBy('orden','ASC')->where('id_generales',$id)->get();

        return view('pages.subgaleria',[
            'metadatos' => $metadato,
            'producto' => $producto,
            'familia2' => $familia2,
            'familias' => $familia,
            'subfamilia' => $subfamilia,
            'imagenes' => $imagen
        ]);
    }
    public function descargas(){
        $metadato= metadato::where('seccion','descargas,')->first();
        $familia = Familia::orderBy('orden','ASC')->get();
        $descarga = Descarga::orderBy('orden', 'ASC')->get();
        return view('pages.descarga',[
            'metadatos' => $metadato,
            'familias' => $familia,
            'descargas' => $descarga
        ]);
    }
    public function calidad(Request $request){
        $metadato= metadato::where('seccion','calidad')->first();
        $familia = Familia::orderBy('orden','ASC')->get();
        $descarga= DescargaCalidad::orderBy('orden','ASC')->get();
        $calidad = Calidad::all()->first();
        return view('pages.calidad',[
            'metadatos' => $metadato,
            'familias' => $familia,
            'descargas' => $descarga,
            'calidad' => $calidad
        ]);
    }
    
    public function contacto(Request $request){
        $metadato= Metadato::where('seccion','contacto')->first();
        $familia = Familia::orderBy('orden','ASC')->get();
        return view('pages.contacto',[
            'metadatos' => $metadato,
            'familias' => $familia
        ]);
    }
    // public function buscador(Request $request){
    //     $metadato= Metadato::where('seccion','buscador')->first();
    //     $producto = null;
    //     return view('pages.buscador',[
    //         'metadatos' => $metadato,
    //         'productos' => $producto
    //     ]);
    // }
    public function buscar(Request $request){
        $metadatos= Metadato::where('seccion','buscador')->first();
        $familias = Familia::orderBy('orden','ASC')->get();
        $productos = null;
        if($request){
            if($request->buscar){
                $productos = Subfamilia::where('nombre_es','like','%'.$request->buscar.'%')->get();
            }
        }
        
        
        return view('pages.buscador',compact('productos','metadatos','familias'));
    }
    /*---------------------------------AQUI ----------*/
    public function presupuesto()
    {
        $metadato= metadato::where('seccion','home')->first();
       
        
        return view('pages.presupuesto',[
            
            'metadatos' => $metadato
        ]);
    }
    public function mail(ContactoRequest $request){
        $correo = Dato::where('tipo','mail')->first();
        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $empresa = $request->empresa;
        $email = $request->email; 
        $mensaje = $request->mensaje;
        Mail::to('angelicabaca4@gmail.com')->send(new sendmail($nombre, $apellido, $empresa, $email, $mensaje));

        if(Mail::failures()){
            flash('Ha ocurrido un error')->error()->important();
            return redirect()->route('contacto');
        }
        flash('El mensaje se ha enviado exitosamente')->success()->important();
            return redirect()->route('contacto');
    }
    public function enviar_presupuesto(Contacto $request)
    {   
        $dato= Dato::where('tipo','mail')->first();
        $nombre= $request->nombre;
        $localidad= $request->localidad;
        $telefono= $request->telefono;
        $email= $request->email;
        $plano= $request->plano;
        $newid = Imagen::all()->max('subproducto_id');
        $mensaje= $request->mensaje;
        $newid++;
        if ($request->hasFile('archivo')) {
            if ($request->file('archivo')->isValid()) {
                $file = $request->file('archivo');
                $path = public_path('img/archivos/');
                $request->file('archivo')->move($path, $newid.'_'.$file->getClientOriginalName());
                $archivo = 'img/archivos/' . $newid.'_'.$file->getClientOriginalName();
                
            }
        }

        //Mail::to($dato)->send(new sendpresupuesto($nombre,$localidad,$email,$telefono,$mensaje,$plano,$archivo));

        Mail::send('pages.enviarpresupuesto', ['nombre' => $nombre, 'localidad' => $localidad, 'email' => $email, 'telefono' => $telefono, 'mensaje' => $mensaje, 'plano' => $plano], function ($message) use ($archivo){

            $message->from('cercas@osolelaravel.com', 'Cercas');

            $message->to('angelicabaca4@gmail.com');

            //Attach file
            $message->attach($archivo);

            //Add a subject
            $message->subject("Hello from Scotch");

        });
        if (Mail::failures()) {
            flash('Ha ocurrido un error.')->error()->important();
            return redirect()->route('presupuesto');
        }
        flash('El mensaje se ha enviado exitosamente.')->success()->important();
        return redirect()->route('presupuesto');
    }

/*----------------------------------------------------------------------------------------*/
}
