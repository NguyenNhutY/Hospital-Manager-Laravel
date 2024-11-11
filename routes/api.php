<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('patients', 'App\Http\Controllers\PatientController@index');
Route::post('patients', 'App\Http\Controllers\PatientController@store');
Route::get('patients/{id}', 'App\Http\Controllers\PatientController@show');
Route::patch('patients/{id}', 'App\Http\Controllers\PatientController@update');
Route::delete('patients/{id}', 'App\Http\Controllers\PatientController@destroy');


Route::get('staff', 'App\Http\Controllers\StaffController@index');
Route::post('staff', 'App\Http\Controllers\StaffController@store');
Route::get('staff/{id}', 'App\Http\Controllers\StaffController@show');
Route::patch('staff/{id}', 'App\Http\Controllers\StaffController@update');
Route::delete('staff/{id}', 'App\Http\Controllers\StaffController@destroy');




Route::get('appointments', 'App\Http\Controllers\AppointmentController@index');
Route::post('appointments', 'App\Http\Controllers\AppointmentController@store');
Route::get('appointments/{id}', 'App\Http\Controllers\AppointmentController@show');
Route::patch('appointments/{id}', 'App\Http\Controllers\AppointmentController@update');
Route::delete('appointments/{id}', 'App\Http\Controllers\AppointmentController@destroy');



Route::get('patients/{patient}/health-records', 'App\Http\Controllers\HealthRecordController@index');
Route::post('patients/{patient}/health-records/{id}', 'App\Http\Controllers\HealthRecordController@store');
Route::get('patients/{patient}/health-records/{id}', 'App\Http\Controllers\HealthRecordController@show');
Route::patch('patients/{patient}/health-records/{id}', 'App\Http\Controllers\HealthRecordController@update');
Route::delete('patients/{patient}/health-records/{id}', 'App\Http\Controllers\HealthRecordController@destroy');



Route::get('medications', 'App\Http\Controllers\MedicationController@index');
Route::post('medications', 'App\Http\Controllers\MedicationController@store');
Route::get('medications/{id}', 'App\Http\Controllers\MedicationController@show');
Route::patch('medications/{id}', 'App\Http\Controllers\MedicationController@update');
Route::delete('medications/{id}', 'App\Http\Controllers\MedicationController@destroy');



Route::get('prescriptions', 'App\Http\Controllers\PrescriptionController@index');
Route::post('prescriptions', 'App\Http\Controllers\PrescriptionController@store');
Route::get('prescriptions/{id}', 'App\Http\Controllers\PrescriptionController@show');
Route::patch('prescriptions/{id}', 'App\Http\Controllers\PrescriptionController@update');
Route::delete('prescriptions/{id}', 'App\Http\Controllers\PrescriptionController@destroy');

Route::post('/login', 'App\Http\Controllers\UserController@login');

Route::post('image', 'App\Http\Controllers\ImageController@imageStore');
Route::get('image', 'App\Http\Controllers\ImageController@index');
Route::delete('image/{id}', 'App\Http\Controllers\ImageController@destroy');



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 