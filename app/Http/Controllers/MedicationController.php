<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medication;

class MedicationController extends Controller
{
    //
    // Get all medications
    public function index()
    {
        return Medication::all();
    }

    // Get a specific medication by ID
    public function show($id)
    {
        return Medication::findOrFail($id);
    }

    // Create a new medication
    public function store(Request $request)
    {
        return Medication::create($request->all());
    }

    // Update an existing medication
    public function update(Request $request, $id)
    {
        $medication = Medication::findOrFail($id);
        $medication->update($request->all());
        return $medication;
    }

    // Delete a medication
    public function destroy($id)
    {
        $medication = Medication::findOrFail($id);
        $medication->delete();
        return response()->json(['message' => 'Medication deleted successfully'], 200);
    }
}
