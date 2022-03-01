<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Ingreso;
use Illuminate\Http\Request;
use Carbon\Carbon;


class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = date('Y-m-d H:i:s');
        $NuevaFecha = strtotime ( '-3 hour' , strtotime ($now) ) ;
        $NuevaFecha = strtotime ( '0 minute' , $NuevaFecha ) ;
        $NuevaFecha = strtotime ( '0 second' , $NuevaFecha ) ;
        $treshoras = date ( 'Y-m-d H:i:s' , $NuevaFecha);
        #return $treshoras."-".$now;
        return Ingreso::whereBetween('created_at', [$treshoras, $now])->get();
    }
    public function horas24()
    {
        #return Ingreso::all();
        return Ingreso::whereDate('created_at', Carbon::today())->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $i =  new Ingreso();
        $i->cantidad = $request->cantidad;
        //$i->created_at = $request->created_at;
        $i->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function show(Ingreso $ingreso)
    {
        return $ingreso;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingreso $ingreso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingreso $ingreso)
    {
        //
    }
}
