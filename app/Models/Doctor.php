<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';
    protected $primaryKey = 'doctor_id';
    protected $fillable = ['master_user_idmaster_user', 'doctor_category_iddoctor_category', 'specialization', 'work_hospital', 'status'];

    public function masterUser()
    {
        return $this->belongsTo(MasterUser::class, 'master_user_idmaster_user');
    }

    public function workingDays()
    {
        return $this->hasMany(DoctorWorkingDay::class, 'doctors_doctor_id');
    }
}
