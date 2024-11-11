<?php

namespace App\Http\Controllers;
use App\Models\Patient;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    //
     // Get all patients
     public function index()
     {
         return Patient::all();
     }
 
     // Get a specific patient by ID
     public function show($id)
     {
         return Patient::findOrFail($id);
     }
 
     // Create a new patient
     public function store(Request $request)
     {
        // $request->validate([
        //     'DateOfBirth' => 'required|date_format:d-m-Y',
        //     // ...
        // ]);
         return Patient::create($request->all());
     }
 
     // Update an existing patient
     public function update(Request $request, $id)
     {
         $patient = Patient::findOrFail($id);
         
         if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        // Update the patient record with the request data

        $patient ->fill($request->only([   'FirstName',
        'LastName', 
        'DateOfBirth',
            'Gender',
           'ContactNumber',
         'Address']));
        $patient->save();
        return response()->json(['message' => 'Patient updated successfully','new' => $patient], );
  
        //  $patient->update($request->all());
        //  return $patient;
     }
 
     // Delete a patient
     public function destroy($id)
     {
         $patient = Patient::findOrFail($id);
         $patient->delete();
         return response()->json(['message' => 'Patient deleted successfully'], 200);
     }
}
