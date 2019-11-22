<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto; //importamas el modelo al que estara vinculado
use Carbon\Carbon; //para el manejo de fechas actuales

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::all(); //variable para guarda o traer todos los registros de proyecto
        return $proyectos;
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
        $fechahoy = Carbon::now(); //obtener las fechas actuales
        $proyecto = new Proyecto();
        $proyecto->nombre = $request->nombre;
        $proyecto->describcion = $request->describcion;
        $proyecto->estado_actual = 0;
        $proyecto->ncolaboradores = 1;
        $proyecto->estatus = "En progreso";
        $proyecto->fec_ini = $fechahoy->format('Y-m-d');
        $proyecto->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyecto = Proyecto::find($id);
        return $proyecto;
        //return view('template.vproyecto');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$proyecto = Proyecto::find($id);
        //return response()->json($proyecto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $proyecto = Proyecto::findOrFail($request->id_proyecto);
        $proyecto->nombre = $request->nombre;
        $proyecto->describcion = $request->describcion;
        $proyecto->estado_actual = $request->estado_actual;
        $proyecto->estatus = $request->estatus;
        $proyecto->ncolaboradores = $request->ncolaboradores;
        $proyecto->fec_ini = $request->fec_ini;
        $proyecto->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateproyecto(Request $request)
    {
        $proyecto = Proyecto::findOrFail($request->id_pro);
        $proyecto->nombre = $request->nombre_pro;
        $proyecto->describcion = $request->describcion_pro;
        $proyecto->estado_actual = $request->estado_actual_pro;
        $proyecto->estatus = $request->estatus_pro;
        $proyecto->ncolaboradores = $request->ncolaboradores_pro;
        $proyecto->fec_ini = $request->fec_ini_pro;
        $proyecto->save();
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
    public function delete($id)
    {
        $proyecto = \App\Proyecto::find($id);
        $proyecto->delete();
        return response()->json(null,204);
    }

    public function proyectov($id)
    {
        $proyecto = Proyecto::find($id);
        //return $proyecto;
        return view('template.vproyecto',array('id'=>$id));
        //return redirect('/proyecto-view/'.$id);
    }

    public function unproyecto($id){
        $proyecto = Proyecto::find($id);
        return $proyecto;
    }
}
