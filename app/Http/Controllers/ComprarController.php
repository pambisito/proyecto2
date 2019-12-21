<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Articulo_User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class ComprarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::paginate(10);
        return view('tienda.comprar', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($codArticulo, $codCliente)
    {   
        /* $compra = Articulo_User::firstOrCreate(['codArticulo' => $codArticulo],['codCliente' => $codCliente]); */

        
            $compra = new Articulo_User;
            $compra->codArticulo = $codArticulo;
            $compra->codCliente = $codCliente;
            $compra->save();
        

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $articuloComprar = Articulo::findOrFail($id);
        $codCliente = Auth::user()->codCliente;
        try {
            $this->create($articuloComprar->codArticulo, $codCliente);
        } catch(QueryException $e) {
            return view('articulo.registrar');
        }
        /* 
        if($articuloComprar->stock <= 0) {
            echo "ya no disponible";
        } else {
            $articuloComprar->stock = $articuloComprar->stock - 1;
            $articuloComprar->save();
        } */

        /* echo $id;
        echo Auth::user()->codCliente; */
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
