<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';
    protected $fillable = ['patient_history', 'reason', 'address', 'master_user_idmaster_user'];

    public function masterUser()
    {
        return $this->belongsTo(MasterUser::class, 'master_user_idmaster_user');
    }
}

