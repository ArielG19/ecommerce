<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarProductos()
    {
       return view('productos.index');
    }

    public function index(Request $request)
    {
        //
          $productos = Product::orderBy('id','DESC')->paginate(2);
        //return $productos;
        return[
            'pagination' => [
                'total'         => $productos->total(),
                'current_page'  => $productos->currentPage(),
                'per_page'      => $productos->perPage(),
                'last_page'     => $productos->lastPage(),
                'from'          => $productos->firstItem(),
                'to'            => $productos->lastItem(),
            ],
            'productos' => $productos
        ];
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
    public function store(Request $request)
    {
        //
        $productos = new Product();
        $productos->titulo = $request->titulo;
        $productos->descripcion = $request->descripcion;
        $productos->precio = $request->precio;
        $productos->user_id = \Auth::user()->id;
        $productos->save();
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
        $productos = Product::findOrFail($id);
        return $productos;
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
        $productos = Product::FindOrFail($id);
        $productos->titulo = $request->titulo;
        $productos->descripcion = $request->descripcion;
        $productos->precio = $request->precio;
        $productos->user_id = \Auth::user()->id;
        $productos->save();
        
        return;
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
        $productos = Product::findOrFail($id);
        $productos->delete();
    }
}
