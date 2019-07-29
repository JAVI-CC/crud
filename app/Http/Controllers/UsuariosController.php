<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuariosRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Usuarios;

class UsuariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(/*Request $request*/)
    {
        //Para que solo puedan ver la vista los usuarios con el role admin.
        //$request->user()->authorizeRoles(['admin']);
        $usuarios = Usuarios::orderBy('created_at', 'desc')->paginate(3);

        return view('usuarios', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuariosRequest $request, Usuarios $usuario){

        $usuarios = new Usuarios();

        $usuario->email = $request->input('Email');
        $usuario->password = $request->input('Password');
        $usuario->save();

        return redirect()->route('usuarios.index', [$usuario])->with('status','Usuario creado correctamente.');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserupdateRequest $request, Usuarios $usuario)
    {
       
       // return $usuario;
       
        $usuario->fill($request->all());
        
        $usuario->save();
        
        return redirect()->route('usuarios.index', [$usuario])->with('status','Usuario actualizado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuarios $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index', [$usuario])->with('status','El usuario ' . $usuario->email . ' se ha eliminado correctamente.');
    }
}
