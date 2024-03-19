<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        return view('areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('areas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'topographic_information' => 'nullable|string',
        ]);

        // Crear un nuevo registro de área
        $area = new Area(); // Importa el modelo Area al principio del archivo si no lo has hecho: use App\Models\Area;
        $area->name = $validatedData['name'];
        $area->topographic_information = $validatedData['topographic_information'];
        $area->save();

        // Redirigir al usuario al índice de áreas
        return redirect()->route('areas.index')->with('success', 'Area created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $area = Area::findOrFail($id);
        return view('areas.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::findOrFail($id);
        return view('areas.edit', compact('area'));
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
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|unique:areas,name,'.$id,
            'topographic_information' => 'nullable|string',
            // Agrega otras reglas de validación si es necesario
        ]);

        // Obtener el registro de área existente
        $area = Area::findOrFail($id);

        // Actualizar los campos del área con los datos del formulario
        $area->name = $request->name;
        $area->topographic_information = $request->topographic_information;
        // Agrega más campos si es necesario

        // Guardar los cambios en la base de datos
        $area->save();

        // Redireccionar a la página de índice con un mensaje de éxito
        return redirect()->route('areas.index')
                        ->with('success', 'Area updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Buscar y eliminar el registro de área
        $area = Area::findOrFail($id);
        $area->delete();

        // Redireccionar a la página de índice con un mensaje de éxito
        return redirect()->route('areas.index')
                        ->with('success', 'Area deleted successfully.');
    }
}
