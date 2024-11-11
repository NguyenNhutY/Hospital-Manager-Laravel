<?php

namespace App\Http\Controllers;
use App\Models\Staff;



use Illuminate\Http\Request;

class StaffController extends Controller
{
    //

     // Get all staff members
     public function index()
     {
         return Staff::all();
     }
 
     // Get a specific staff member by ID
     public function show($id)
     {
         return Staff::findOrFail($id);
     }
 
     // Create a new staff member
     public function store(Request $request)
     {
         return Staff::create($request->all());
     }
 
     // Update an existing staff member
     public function update(Request $request, $id)
     {
         $staff = Staff::findOrFail($id);
         $staff->update($request->all());
         return $staff;
     }
 
     // Delete a staff member
     public function destroy($id)
     {
         $staff = Staff::findOrFail($id);
         $staff->delete();
         return response()->json(['message' => 'Staff member deleted successfully'], 200);
     }
}
