<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();
        DB::table('users')->insert([
        	'name' => 'admin',
        	'email' => 'locxanh2309@gmail.com',
        	'password' => bcrypt('12345678'),

        ]);
    }
}
