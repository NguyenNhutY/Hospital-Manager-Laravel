<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'FirstName',
        'LastName', 
        'Role',
            'ContactNumber',
         'Address'
       
    ];
    public function appointments()
{
    return $this->belongsToMany('App\Models\Appointment', 'AppointmentStaff', 'StaffID', 'AppointmentID');
}
}
