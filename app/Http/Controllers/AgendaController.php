<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

    /**
     * Lista todos os registros da agenda.
     */
    public function index()
    {
        $agenda = Agenda::all();

        return response()->json([
            'success' => true,
            'data' => $agenda,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'image_url' => 'nullable',
        ]);

        // Check if the request has an image
        if ($request->hasFile('image_url')) {
            // Store the image and get the path
            $imagePath = $request->file('image_url')->store('images', 'public');
            $validatedData['image_url'] = $imagePath;
        }


        $agenda = Agenda::create($validatedData);

        return response()->json($agenda, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'image_url' => 'nullable|string|max:255',
        ]);


        $agenda->update($validatedData);


        return response()->json($agenda, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return response()->json('Deletado', 204);
    }
}
