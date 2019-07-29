<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EntregaRequest;
use App\Http\Requests\EntregaUpdateRequest;
use App\Entrega;

class EntregaController extends Controller
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
    public function index()
    {
        $entregas = Entrega::orderBy('created_at', 'desc')->paginate(3);

        return view('entrega', compact('entregas'));
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
    public function store(EntregaRequest $request, Entrega $entrega)
    {
        $entregas = new Entrega();

        $entrega->telefono = $request->input('Telefono');
        $entrega->fecha_inicio = $request->input('Fecha_inicio');
        $entrega->fecha_final = $request->input('Fecha_final');
        $entrega->save();

        return redirect()->route('entrega.index', [$entrega])->with('status','Entrega creado correctamente.');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EntregaupdateRequest $request, Entrega $entrega)
    {
        $entrega->fill($request->all());
        
        $entrega->save();
        
        return redirect()->route('entrega.index', [$entrega])->with('status','Entrega actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrega $entrega)
    {
        $entrega->delete();
        return redirect()->route('entrega.index', [$entrega])->with('status','La entrega con el telefono ' . $entrega->telefono . ' se ha eliminado correctamente.');
    }
}
