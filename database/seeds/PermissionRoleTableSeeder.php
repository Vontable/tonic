<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->truncate();

        DB::table('permission_role')->insert([
        	[
        		'permission_id' => 1, 	// impersonate_users
        		'role_id' => 2 			// admin
        	]
        ]);
    }
}
