<?php

namespace App\Http\Controllers;

use App\Comprobante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComprobantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function update(Request $request, $id)
    {
        $validacion =   Validator::make($request->all(), [
            'desde' => 'nullable|date',
            'hasta' => 'nullable|date|after:desde',
        ]);
        if($validacion->fails()){
            $texto  =   '';
            foreach ($validacion->errors()->all() as $errores)
                $texto.=$errores.PHP_EOL;
            return response(['val'=>false,'message'=>$texto,'datos'=>$validacion->errors()->all()],500);
        }else{
            if($request->desde && $request->hasta)
                $lista  =   Comprobante::where("id_cl",$id)
                    ->orderBy("fecha_co","asc")
                    ->orderBy("id_tc","desc")
                    ->whereBetween('fecha_co', [$request->desde, $request->hasta])
                    ->get();
            else
                $lista  =   Comprobante::where("id_cl",$id)
                    ->orderBy("fecha_co","asc")
                    ->orderBy("id_tc","desc")
                    ->get();

            return response($lista);
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
        //
    }
}
