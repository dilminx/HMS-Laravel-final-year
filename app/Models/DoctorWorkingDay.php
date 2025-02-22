<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorWorkingDay extends Model
{
    use HasFactory;

    protected $table = 'doctor_working_days';
    protected $fillable = ['doctors_doctor_id', 'working_days_idworking_days', 'time_slot_idtime_slot'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctors_doctor_id');
    }
}
