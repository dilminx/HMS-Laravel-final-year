<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $table = 'user_roles';
    protected $primaryKey = 'iduser_roles';

    protected $fillable = ['role_name', 'status'];

    // public function users()
    // {
    //     return $this->hasMany(MasterUser::class, 'user_role_iduser_roles', 'iduser_roles');
    // }
}
