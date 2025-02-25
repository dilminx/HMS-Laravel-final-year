<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    protected $primaryKey = 'idappoinments';
    protected $fillable = ['appointment_date', 'status', 'doctors_doctor_id', 'patients_idpatients'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctors_doctor_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patients_idpatients');
    }
}

