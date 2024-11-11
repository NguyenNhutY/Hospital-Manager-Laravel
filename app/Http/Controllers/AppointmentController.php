<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    //

     // Get all appointments
     public function index()
     {
         return Appointment::all();
     }
 
     // Get a specific appointment by ID
     public function show($id)
     {
         return Appointment::findOrFail($id);
     }
 
     // Create a new appointment
     public function store(Request $request)
     {
         return Appointment::create($request->all());
     }
 
     // Update an existing appointment
     public function update(Request $request, $id)
     {
         $appointment = Appointment::findOrFail($id);
         $appointment->update($request->all());
         return $appointment;
     }
 
     // Delete an appointment
     public function destroy($id)
     {
         $appointment = Appointment::findOrFail($id);
         $appointment->delete();
         return response()->json(['message' => 'Appointment deleted successfully'], 200);
     }
}
