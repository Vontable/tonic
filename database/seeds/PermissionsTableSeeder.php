<?php

use Carbon\Carbon;

use Tonic\Permission;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

    	DB::table('permissions')->truncate();

        Permission::create([
    		'name' => 'impersonate_users'
    	]);
    }
}
