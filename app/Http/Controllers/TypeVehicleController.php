<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeVehicle;

class TypeVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los tipos de vehículos
        $typevehicles = TypeVehicle::all();
        // Mostrar la vista con la lista de tipos de vehículos
        return view('typevehicles.index', compact('typevehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mostrar el formulario para crear un nuevo tipo de vehículo
        return view('typevehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|unique:type_vehicles',
            // Agrega otras reglas de validación si es necesario
        ]);

        // Crear un nuevo registro de tipo de vehículo
        TypeVehicle::create($request->all());

        // Redireccionar a la página de índice con un mensaje de éxito
        return redirect()->route('typevehicles.index')
                        ->with('success', 'Type of vehicle created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Obtener el tipo de vehículo por su ID
        $typevehicle = TypeVehicle::findOrFail($id);
        // Mostrar la vista con los detalles del tipo de vehículo
        return view('typevehicles.show', compact('typevehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Obtener el tipo de vehículo por su ID
        $typevehicle = TypeVehicle::findOrFail($id);
        // Mostrar el formulario para editar el tipo de vehículo
        return view('typevehicles.edit', compact('typevehicle'));
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
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|unique:type_vehicles,name,'.$id,
            // Agrega otras reglas de validación si es necesario
        ]);

        // Actualizar el registro de tipo de vehículo existente
        $typevehicle = TypeVehicle::findOrFail($id);
        $typevehicle->update($request->all());

        // Redireccionar a la página de índice con un mensaje de éxito
        return redirect()->route('typevehicles.index')
                        ->with('success', 'Type of vehicle updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Buscar y eliminar el registro de tipo de vehículo
        $typevehicle = TypeVehicle::findOrFail($id);
        $typevehicle->delete();

        // Redireccionar a la página de índice con un mensaje de éxito
        return redirect()->route('typevehicles.index')
                        ->with('success', 'Type of vehicle deleted successfully.');
    }
}
