<?php

use Carbon\Carbon;

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

        DB::table('roles')->insert([
        	[
        		'name' => 'member',
        		'label' => 'member',
        		'created_at' => Carbon::now()
        	],
        	[
        		'name' => 'admin',
        		'label' => 'admin',
        		'created_at' => Carbon::now()
        	]
        ]);
    }
}
