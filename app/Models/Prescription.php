<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = [
        'PatientID',
        'StaffID',
        'PrescriptionDate',
        'MedicationID',
        'Quantity'
    ];

    public function medication()
{
    return $this->belongsTo('App\Models\Medication', 'MedicationID');
}
}
