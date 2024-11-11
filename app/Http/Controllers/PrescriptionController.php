<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Medication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{
    //
    // Get all prescriptions for a specific patient
    public function index()
    {
        return Prescription::all();
    }

    // Get a specific prescription by ID
    public function show($id)
    {
        return Prescription::findOrFail($id);
    }

    // Create a new prescription for a specific patient
    public function store(Request $request, )
    {
        // $request->validate([
        //     'MedicationID' => 'required|exists:medications,id',
        //     'Quantity' => 'required|integer|min:1'
        //     // Add any other validation rules you need
        // ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Create the prescription
            $prescription = Prescription::create([
                'PatientID' => $request->input('PatientID'),
                'StaffID' => $request->input('StaffID'),
                'PrescriptionDate' => now(),
                'MedicationID' => $request->input('MedicationID'),
                'Quantity' => $request->input('Quantity')
            ]);

            // Reduce the stock of the prescribed medication
            $medication = Medication::findOrFail($request->input('MedicationID'));
            $medication->StockQuantity -= $request->input('Quantity');
            $medication->save();

            // Commit the transaction
            DB::commit();

            return response()->json($prescription, 201);
        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            DB::rollBack();

            return response()->json(['message' => 'Failed to create prescription. ' .$e], 500);
        }
        
    }

    // Update an existing prescription
    public function update(Request $request, $id)
    {
        $prescription = Prescription::findOrFail($id);
        $prescription->update($request->all());
        return $prescription;
    }

    // Delete a prescription
    public function destroy($id)
    {
        $prescription = Prescription::findOrFail($id);
        $prescription->delete();
        return response()->json(['message' => 'Prescription deleted successfully'], 200);
    }
}
