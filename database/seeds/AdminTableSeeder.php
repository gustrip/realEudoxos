<?php

use Illuminate\Database\Seeder;
use realEudoxos\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(array(
        	'name'=>'realEudoxus_admin',
        	'email'=>'admin@gmail.com',
        	'password'=>Hash::make('password'),
        	));
    }
}
