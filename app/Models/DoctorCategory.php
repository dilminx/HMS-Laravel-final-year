<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorCategory extends Model
{
    use HasFactory;
    protected $table = 'doctor_category'; 
    protected $primaryKey = 'iddoctor_category';
  
    protected $fillable = ['category_doctor','category_amount','created_at','updated_at'];
}
