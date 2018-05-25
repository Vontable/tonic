<?php

use Carbon\Carbon;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

    	DB::table('users')->truncate();

    	DB::table('users')->insert([
        	[
        		'first_name' => 'Filip',
        		'last_name' => 'Petrovic',
        		'email' => 'filipetro@hotmail.de',
        		'password' => bcrypt('password'),
        		'created_at' => Carbon::now()
        	]
        ]);
    }
}
