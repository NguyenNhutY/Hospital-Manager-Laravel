<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthRecord;

class HealthRecordsController extends Controller
{
    //
     // Get all health records for a specific patient
     public function index($patientId)
     {
         return HealthRecord::where('PatientID', $patientId)->get();
     }
 
     // Get a specific health record by ID
     public function show($id)
     {
         return HealthRecord::findOrFail($id);
     }
 
     // Create a new health record for a specific patient
     public function store(Request $request, $patientId)
     {
         $request->merge(['PatientID' => $patientId]);
         return HealthRecord::create($request->all());
     }
 
     // Update an existing health record
     public function update(Request $request, $id)
     {
         $healthRecord = HealthRecord::findOrFail($id);
         $healthRecord->update($request->all());
         return $healthRecord;
     }
 
     // Delete a health record
     public function destroy($id)
     {
         $healthRecord = HealthRecord::findOrFail($id);
         $healthRecord->delete();
         return response()->json(['message' => 'Health record deleted successfully'], 200);
     }
}
