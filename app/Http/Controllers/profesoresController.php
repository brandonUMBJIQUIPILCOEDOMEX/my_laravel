<?php

namespace App\Http\Controllers;

use App\Models\Profesores;
use Illuminate\Http\Request;

class profesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // aqui es para ver apenas lo que se genero
        $profesores = Profesores::all();
        return view('profesores.index', ['profesores' => $profesores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // agregado para retornar la vista de registrar un alumno
        return view('profesores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //cuando se trabaja con post llega aqui
        $request->validate(
            [
                'nombre' => 'required|unique:profesores|max:100',
                'a_paterno' => 'required|max:100',
                'a_materno' => 'required|max:100',
                'especialidad' => 'required|max:100'

            ]
        );

        $profesor = new Profesores();
        $profesor->nombre = $request->input('nombre');
        $profesor->apellido_paterno = $request->input('a_paterno');
        $profesor->apellido_materno = $request->input('a_materno');
        $profesor->especialidad = $request->input('especialidad');
        $profesor->save();

        return view("profesores.message", ['msg' => "Registro guardado"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profesores $profesores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($clave_profesor)
    {
        // controlador para la vista y funcion editar

        //  $profesor = Profesores::find($clave_profesor);    // * busca por defecto y consulta por id
        $profesor = Profesores::where('clave_profesor', $clave_profesor)->first();
        return view('profesores.edit', ['profesor' => $profesor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $clave_profesor)
    {
        // obtiene los datos para actualizar el formulario
        //cuando se trabaja con post llega aqui
        $request->validate(
            [
                'nombre' => 'required|max:100',
                'a_paterno' => 'required|max:100',
                'a_materno' => 'required|max:100',
                'especialidad' => 'required|max:100'

            ]
        );

        /*
        $profesor = Profesores::find($clave_profesor);
        //$profesor = Profesores::where('clave_profesor', $clave_profesor)->first();
        $profesor->nombre = $request->input('nombre');
        $profesor->apellido_paterno = $request->input('a_paterno');
        $profesor->apellido_materno = $request->input('a_materno');
        $profesor->especialidad = $request->input('especialidad');
        $profesor->save();
        */

        /*
        $profesor = Profesores::where('clave_profesor', $clave_profesor)->first();

        if ($profesor) {
            $profesor->nombre = $request->input('nombre');
            $profesor->apellido_paterno = $request->input('a_paterno');
            $profesor->apellido_materno = $request->input('a_materno');
            $profesor->especialidad = $request->input('especialidad');
            $profesor->save();
        }
        */
        Profesores::where('clave_profesor', $clave_profesor)->update([
            'nombre' => $request->input('nombre'),
            'apellido_paterno' => $request->input('a_paterno'),
            'apellido_materno' => $request->input('a_materno'),
            'especialidad' => $request->input('especialidad'),
        ]);
        return view("profesores.message", ['msg' => "Registro modificado"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($clave_profesor)
    {
        // funcion para eliminar recibimos por parametro el id
        /*
        $profesor = Profesores::find($clave_profesor);
        $profesor->delete();
        */


        Profesores::where('clave_profesor', $clave_profesor)->delete();


        return redirect("profesores");

        
    }
}
