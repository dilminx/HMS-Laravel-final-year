<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabReport extends Model
{
    use HasFactory;

    protected $table = 'lab_report';
    protected $fillable = ['report_file', 'lab_request_idlab_request'];

    public function labRequest()
    {
        return $this->belongsTo(LabRequest::class, 'lab_request_idlab_request');
    }
}

