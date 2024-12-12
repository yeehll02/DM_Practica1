<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;


class MascotaController extends Controller
{
    /**
     * Display a listing of the resource. Obtener todas las entidades
     */
    // Permite obtener todos los registros
    public function index()
    {
        // Paginación
        $mascotas = Mascota::paginate(10);
        return response()->json($mascotas);

    
        // return response()->json(Mascota::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    // Permite crear un nuevo registro
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipoAnimal' => 'required|string|max:255',
            'edad' => 'required|integer|min:0',
            'amo' => 'required|string|max:255',
        ]);

        $mascota = Mascota::create([
            'nombre' => $request->nombre,
            'tipoAnimal' => $request->tipoAnimal,
            'edad' => $request->edad,
            'amo' => $request->amo,
        ]);

        return response()->json($mascota);
    }

    /**
     * Display the specified resource.
     */
    // Permite obtener un registro en especifico
    public function show($id)
    {
        $mascota = Mascota::findOrFail($id);
        return response()->json($mascota);
    }


    /**
     * Update the specified resource in storage.
     */
    // Permite actualizar un registro
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipoAnimal' => 'required|string|max:255',
            'edad' => 'required|integer|min:0',
            'amo' => 'nullable|string|max:255',
        ]);

        $mascota = Mascota::findOrFail($id);
        $mascota->update([
            'nombre' => $request->nombre,
            'tipoAnimal' => $request->tipoAnimal,
            'edad' => $request->edad,
            'amo' => $request->amo,
        ]);

        return response()->json($mascota);
    }

    /**
     * Remove the specified resource from storage.
     */
    // Permite eliminar un registro
    public function destroy( $id)
    {
        $mascota = Mascota::findOrFail($id);
        $mascota->delete();

        return response()->json(null);
    }
}
