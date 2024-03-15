<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();
        return view('positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('positions.create');
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
        $request->validate([
            'name' => 'required|unique:positions,name',
            // Agrega otras reglas de validación si es necesario
        ]);

        // Crear un nuevo registro de posición
        Position::create($request->all());

        // Redireccionar a la página de índice con un mensaje de éxito
        return redirect()->route('positions.index')
                        ->with('success', 'Position created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $position = Position::findOrFail($id);
        return view('positions.show', compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position = Position::findOrFail($id);
        return view('positions.edit', compact('position'));
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
            'name' => 'required|unique:positions,name,'.$id,
            // Agrega otras reglas de validación si es necesario
        ]);

        // Actualizar el registro de posición existente
        $position = Position::findOrFail($id);
        $position->update($request->all());

        // Redireccionar a la página de índice con un mensaje de éxito
        return redirect()->route('positions.index')
                        ->with('success', 'Position updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Buscar y eliminar el registro de posición
        $position = Position::findOrFail($id);
        $position->delete();

        // Redireccionar a la página de índice con un mensaje de éxito
        return redirect()->route('positions.index')
                        ->with('success', 'Position deleted successfully.');
    }
}
