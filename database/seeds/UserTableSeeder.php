<?php

use Illuminate\Database\Seeder;
// use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name'=> 'ashu',
        	'email' => 'ashu@admin.com',
        	'password' => Hash::make('12345678'),
        	'is_admin' => '1'
        ]);
    }
}
