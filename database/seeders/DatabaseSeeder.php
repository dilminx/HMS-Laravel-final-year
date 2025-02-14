<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            ['iduser_role' => 1, 'role_name' => 'Admin', 'status' => 1],
            ['iduser_role' => 2, 'role_name' => 'Patient', 'status' => 1],
            ['iduser_role' => 3, 'role_name' => 'Doctor', 'status' => 1],
            ['iduser_role' => 4, 'role_name' => 'Lab Assistant', 'status' => 1],
        ]);
    }
}
