<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mail;
use App\Mail\EnviarAlerta;

use App\Catalogo;
use App\User;
class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Catalogo::where('activo', 1)->get();
        return json_encode($data);
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
        if($request != null){
            $cat = new Catalogo; 
            $cat->Nombre = $request->Nombre; 
            $cat->Descripcion = $request->Descripcion; 
            $cat->Unidad_medida = $request->Unidad_medida; 
            $cat->Precio = $request->Precio; 
            $cat->Marca = $request->Marca;  
            $cat->save();
           // dd($cat );
            $this->email($cat);
            return json_decode('se agrego Correctamente');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Catalogo::where('id', $id)->where('activo', 1)->get();
        return json_encode($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Catalogo::where('id', $id)->where('activo', 1)->get();
        return json_encode($data);
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
        $data = Catalogo::where('id', $id)->where('activo', 1)->first();
        if($data != null){
            if($request->Nombre != null){
                $data->Nombre = $request->Nombre;
            }
            if($request->Descripcion != null){
                $data->Descripcion = $request->Descripcion;
            }
            if($request->Unidad_medida != null){
                $data->Unidad_medida = $request->Unidad_medida;
            }
            if($request->Precio != null){
                $data->Precio = $request->Precio;
            }
            if($request->Marca != null){
                $data->Marca = $request->Marca;
            }
            $data->save();
            $this->email($data);
            return json_encode('Se Actualizo Correctamente');
        }else{
            return json_encode('No se encontro el ID');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Catalogo::find($id);
        if($data != null){
           $this->email($data);
           $data->delete(); 
        }
        
    }

    public function email($receivers, $cat){
        $receivers = User::where('rol_id', '!=', 3)->select('email')->get();
        Mail::to($receivers)->send(new EnviarAlerta($cat));
    }
}
