<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->truncate();

        DB::table('role_user')->insert([
        	[
        		'role_id' => 2, 	// admin
        		'user_id' => 1
        	]
        ]);
    }
}
