<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'FirstName',
        'LastName', 
        'DateOfBirth',
            'Gender',
           'ContactNumber',
         'Address'
       
    ];

    use HasFactory;
    protected $primaryKey = 'PatientID';

    public function healthRecords()
{
    return $this->hasMany('App\Models\HealthRecord', 'PatientID');
}

public function appointments()
{
    return $this->hasMany('App\Models\Appointment', 'PatientID');
}   

public function prescriptions()
{
    return $this->hasMany('App\Models\Prescription', 'PatientID');
}
}
