<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Personas::orderBy('paterno', 'desc')->paginate(2);
        return view('inicio', compact('datos'));
        //pagina de inicio
    }

   
    public function create()
    {
        //formulario donde nosotros agregamos los datos
        return view('agregar');
    }

    
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
        'paterno' => 'required|string|max:255',
        'materno' => 'required|string|max:255',
        'nombre' => 'required|string|max:255',
        'fecha_nacimiento' => 'required|date_format:Y-m-d',
        ]);

        //sirve para guardar datos en la base de datos
        $personas = new Personas();
        $personas->paterno = $request->post('paterno');
        $personas->materno = $request->post('materno');
        $personas->nombre = $request->post('nombre');
        $personas->fecha_nacimiento = $request->post('fecha_nacimiento');
        $personas->save();

        return redirect()->route("personas.index")->with("success", "Registro guardado correctamente");
    }

    
    public function show($id)
    {
        //servira para obtener un registro de nuestra tabla
        $personas = Personas::find($id);
        return view('eliminar', compact('personas'));
    }

    
    public function edit($id)
    {
        //nos sirve para traer los datos que se van a editar y los pone en un formulario
        $personas = Personas::find($id);
        return view('actualizar', compact('personas'));
         
    }

    
    public function update(Request $request, $id)
    {
        //actualiza los datos en la base de datos
        $personas = Personas::find($id);
        $personas->paterno = $request->post('paterno');
        $personas->materno = $request->post('materno');
        $personas->nombre = $request->post('nombre');
        $personas->fecha_nacimiento = $request->post('fecha_nacimiento');
        $personas->save();

        return redirect()->route("personas.index")->with("success", "Registro actualizado correctamente");
    }

    
    public function destroy($id)
    {
        //elimina un registro de la base de datos
        $personas = Personas::find($id);
        $personas->delete();
        return redirect()->route("personas.index")->with("success", "Registro eliminado correctamente");
    }
}
