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
        $typeVehicles = TypeVehicle::all();
        // Mostrar la vista con la lista de tipos de vehículos
        return view('typevehicles.index', compact('typeVehicles'));
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
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:typevehicles',
            // Agrega otras reglas de validación si es necesario
        ]);

        // Crear un nuevo registro de tipo de vehículo
        $typeVehicle = new TypeVehicle();
        $typeVehicle->name = $validatedData['name'];
        // Agrega más campos si es necesario
        $typeVehicle->save();

        // Redirigir a la página de índice con un mensaje de éxito
        return redirect()->route('typevehicles.index')->with('success', 'Type of vehicle created successfully.');
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
        $typeVehicle = TypeVehicle::findOrFail($id);
        // Mostrar la vista con los detalles del tipo de vehículo
        return view('typevehicles.show', compact('typeVehicle'));
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
        $typeVehicle = TypeVehicle::findOrFail($id);
        // Mostrar el formulario para editar el tipo de vehículo
        return view('typevehicles.edit', compact('typeVehicle'));
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
            'name' => 'required|unique:typevehicles,name,'.$id,
        ]);

        // Obtener el registro de tipo de vehículo existente
        $typeVehicle = TypeVehicle::findOrFail($id);

        // Actualizar los campos del tipo de vehículo con los datos del formulario
        $typeVehicle->name = $request->name;
        // Agrega más campos si es necesario

        // Guardar los cambios en la base de datos
        $typeVehicle->save();

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
        $typeVehicle = TypeVehicle::findOrFail($id);
        $typeVehicle->delete();

        // Redireccionar a la página de índice con un mensaje de éxito
        return redirect()->route('typevehicles.index')
                        ->with('success', 'Type of vehicle deleted successfully.');
    }
}
