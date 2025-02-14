<?php



namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('master_user')->insert([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'), 
            'mobile_number' => '0771122333',
            'user_role_iduser_role' => 1, 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
