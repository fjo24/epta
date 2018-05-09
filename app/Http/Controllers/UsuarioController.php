<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UsuarioRequest;
use App\User;

class UsuarioController extends Controller
{
    public function index()
    {
         $usuario = User::orderBy('id','ASC')->paginate(5);
        return view('adm.control.usuario.ListaUsuario')
        ->with('usuarios',$usuario);
    }

    public function create()
    {
        return view('adm.control.usuario.CrearUsuario');
    } 

    public function store(UsuarioRequest $request)
     {
        $usuario = new User();
        $usuario->nombre= ucfirst(trans($request->nombre));
        $usuario->username = $request->username;
        $usuario->password= \Hash::make($request->password);
        $usuario->nivel = $request->nivel;
        $usuario->save();
        flash('Se ha registrado '. $usuario->nombre . ' de forma exitosa')->success()->important();
        return redirect()->route('usuario.index');
    }

    public function authentificate (UsuarioRequest $request) {

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'nivel' => 'administrador'])) {
            return view('adm.cuerpo')->
            with('usuario',$request);
        }
        else{
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'nivel' => 'usuario'])) {
                return view('adm.cuerpo')->
                with('usuario',$request);
            }
            else {
                flash('Credenciales incorrectas')->error()->important();
                return redirect()->route('welcome');
            }
        }
    }
    public function login(){
        return view('adm.login');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('usuario.login');
    }

    public function edit($id)
    {
        $usuario = user::find($id);
        return view('adm.control.usuario.EditarUsuario')
        ->with('usuarios',$usuario);
    }
    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $usuario=User::find($id);
        $usuario->nombre= ucfirst(trans($request->nombre));
        $usuario->username=$request->username;
        $usuario->nivel=$request->nivel;
        if($request->password != $usuario->password){
            $usuario->password= \Hash::make($request->password);
        }
        
        $usuario->save();
        
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('usuario.index');
    }


    public function destroy($id)
    {
        $usuario= User::find($id);
        $usuario -> delete();
        flash('Se ha eliminado correctamente.')->success()->important();
        return redirect()->route('usuario.index');
    }
}
