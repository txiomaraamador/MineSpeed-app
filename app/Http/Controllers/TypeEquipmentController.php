<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeEquipment;

class TypeEquipmentController extends Controller
{
    public function index()
    {
        $TypeEquipments = typeequipment::all();
        return view('TypeEquipments.index', compact('TypeEquipments'));
    }

    public function create()
    {
        return view('TypeEquipments.create');
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'description' => 'nullable|string',
            'model' => 'required|string|max:255',
            // Agrega más reglas de validación según sea necesario
        ]);

        // Crear un nuevo registro de TypeEquipment
        $typeEquipment = new TypeEquipment();
        $typeEquipment->make = $validatedData['make'];
        $typeEquipment->description = $validatedData['description'];
        $typeEquipment->model = $validatedData['model'];
        // Agrega más campos si es necesario
        $typeEquipment->save();

        // Redireccionar a la página de índice con un mensaje de éxito
        return redirect()->route('TypeEquipments.index')->with('success', 'Type Equipment created successfully');
    }


    public function edit($id)
    {
        $typeEquipment = TypeEquipment::findOrFail($id);
        return view('TypeEquipments.edit', compact('typeEquipment'));
    }


    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'make' => 'required|string|max:255',
            'description' => 'nullable|string',
            'model' => 'required|string|max:255',
        ]);

        // Obtener el registro de tipo de equipo por su ID
        $TypeEquipment = TypeEquipment::findOrFail($id);

        // Actualizar los campos del tipo de equipo con los datos del formulario
        $TypeEquipment->make = $request->make;
        $TypeEquipment->description = $request->description;
        $TypeEquipment->model = $request->model;
        // Agrega más campos si es necesario

        // Guardar los cambios en la base de datos
        $TypeEquipment->save();

        // Redireccionar a la página de índice con un mensaje de éxito
        return redirect()->route('TypeEquipments.index')
                        ->with('success', 'Type Equipment updated successfully.');
    }

    public function destroy($id)
    {
        $typeEquipment = typeequipment::findOrFail($id);
        $typeEquipment->delete();

        return redirect()->route('TypeEquipments.index')
                        ->with('success', 'Type Equipment deleted successfully.');
    }
}
