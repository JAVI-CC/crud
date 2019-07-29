<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductupdateRequest;
use App\Productos;

class ProductoController extends Controller
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
        $productos = Productos::orderBy('created_at', 'desc')->paginate(3);

        return view('producto', compact('productos'));
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
    public function store(ProductRequest $request, Productos $producto)
    {
        $productos = new Productos();

        $producto->nombre = $request->input('Nombre');
        $producto->precio = $request->input('Precio');
        $producto->unidades = $request->input('Unidades');
        $producto->save();

        return redirect()->route('producto.index', [$producto])->with('status','Producto creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
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
    public function update(ProductupdateRequest $request, Productos $producto)
    {
        $producto->fill($request->all());
        
        $producto->save();
        
        return redirect()->route('producto.index', [$producto])->with('status','Producto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $producto)
    {
        $producto->delete();
        return redirect()->route('producto.index', [$producto])->with('status','El producto ' . $producto->nombre . ' se ha eliminado correctamente.');
    }
}
