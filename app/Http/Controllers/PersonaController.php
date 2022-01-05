<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Periodo;
use Illuminate\Http\Request;
use App\Models\Persona;
use Exception;

class PersonaController extends Controller
{

    public function __construct(){
        return $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // select * from personas
        $lista_personas = Persona::get();
        $lista_carreras = carrera::get();
        return view("admin.persona.listado", compact("lista_personas", "lista_carreras"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.persona.nuevo");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombres" => "required",
            "paterno" => "required",
            "ci" => "required|unique:personas"
        ]);

        try{
            $persona = new Persona;
            $persona->nombres = $request->nombres;
            $persona->paterno = $request->paterno;
            $persona->materno = $request->materno;
            $persona->ci = $request->ci;
            $persona->telefono = $request->telefono;
            $persona->direccion = $request->direccion;
            $persona->saveOrFail();

            /*Persona::create([

            ])*/
        }catch(Exception $e){
            
        }
        return redirect("/admin/persona")->with("mensaje", "La Persona ha sido registrada");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = Persona::findOrFail($id);
        return $persona;
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
        $request->validate([
            "nombres" => "required",
            "paterno" => "required",
            "ci" => "required|unique:personas,ci,".$id
        ]);

        $persona = Persona::find($id);
        $persona->nombres = $request->nombres;
        $persona->paterno = $request->paterno;
        $persona->materno = $request->materno;
        $persona->ci = $request->ci;
        $persona->telefono = $request->telefono;
        $persona->direccion = $request->direccion;
        $persona->save();

        return redirect()->back()->with("mensaje", "La Persona ha sido Modificada");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::find($id);
        $persona->delete();
        return redirect()->back()->with("mensaje", "La Persona ha sido Eliminada");
    }

    public function asig_materias_persona(Request $request, $id)
    {
        $carrera = Carrera::find($request->carrera_id);
        $persona = Persona::find($id);
        $perido = Periodo::get();
        return view("admin.materia.asig_materias_persona", compact("carrera", "persona", "perido"));
    }

    public function asignar(Request $request, $id)
    {
        // return $request;
        // M:M
        $persona = Persona::find($id);
        $persona->materias()->attach($request->materias, ["periodo_id" => $request->periodo_id]);
        
        return redirect()->back();
    }
}
