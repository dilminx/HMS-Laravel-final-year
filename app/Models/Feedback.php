<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['feedback', 'patients_idpatients', 'doctors_doctor_id'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctors_doctor_id');
    }
}
