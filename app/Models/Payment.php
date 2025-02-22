<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $fillable = ['amount', 'method', 'appointments_idappointments'];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointments_idappointments');
    }
}
