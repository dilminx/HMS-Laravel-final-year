<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabRequest extends Model
{
    use HasFactory;

    protected $table = 'lab_request';
    protected $fillable = ['status', 'lab_tests_idlab_tests', 'patients_idpatients', 'doctors_doctor_id'];

    public function labTest()
    {
        return $this->belongsTo(LabTest::class, 'lab_tests_idlab_tests');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patients_idpatients');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctors_doctor_id');
    }
}

