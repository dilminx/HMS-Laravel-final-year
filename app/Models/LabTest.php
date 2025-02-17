<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    use HasFactory;
    protected $table = 'lab_tests'; 
    protected $primaryKey = 'idlab_test';
    
        protected $fillable = ['labtest_name', 'test_amount', 'status'];
    
}
