<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Articulo_User;
use App\Articulo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $misArticulos = Articulo_User::where('codCliente', Auth::user()->codCliente)->get();
        $articulos = array();
        foreach ($misArticulos as $item) {
            $articulos[] = Articulo::findOrFail($item->codArticulo);
        }

        return view('auth.home', compact('articulos'));
    }
}
