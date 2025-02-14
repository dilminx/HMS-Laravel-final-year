<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ Use this instead of Model
use Illuminate\Notifications\Notifiable;

class MasterUser extends Authenticatable // ✅ Extend Authenticatable instead of Model
{
    use HasFactory, Notifiable; // ✅ Add Notifiable for future notifications

    protected $table = 'master_user';
    protected $primaryKey = 'idmaster_user';

    public $timestamps = true;
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'mobile_number',
        'user_role_iduser_role', 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
