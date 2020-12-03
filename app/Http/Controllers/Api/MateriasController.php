<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//importar nuestro modelo a ocupar 
use App\Materias;
//Mandamos a llamar el request a traves de un alias  de MateriaRequests 
use App\Http\Requests\Materia as MateriaRequests;


class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       // Creamos un constructor el constructor siver para que antes de que se ejecute cualquier
   // funcion valida que se cumpla todo lo que esta dentro del constructor

   protected $materia;

   public function __construct (Materias $materia) {
       $this->materia = $materia;

   }
    public function index()
    {
        //
         // ELOQUEN DE LARVAERL 
        //SELECT * FROM MATERIAS ;
        $materias = Materias::all();
       // retorna el array en formato json
        return response()->json(['materias'=> $materias]);
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
        //return $request;
        $materia = $this->materia->create($request->all());
            return;
        //return  response()->json($materia);
        //return response()->json(new MateriaRequests($materia), 201); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // $materias se le conoce como un enlace implicito por que al listar la ruta por ende nos manda materias
    public function show($id)
    {
        //
       $materia = Materias::find($id);

        return response()->json($materia); 
        
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
    public function update(MateriaRequests  $request, Materias $materia)
    {
        //return $request;
        $materia->update($request->all());
        return;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materias $materia)
    {
        $materia->delete();
        return response()->json('el registro fue eliminado correctamente');
    }
}
