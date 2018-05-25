<?php

use Carbon\Carbon;

use Tonic\Role;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS=0');

    	DB::table('roles')->truncate();

        Role::create([
            'name' => 'member'
        ]);

        Role::create([
            'name' => 'admin'
        ]);
    }
}
