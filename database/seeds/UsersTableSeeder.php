<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create(
        	[
        		'name' => 'Admin',
        		'email' => 'admin@admin.com',
        		'password' => bcrypt('password'),
        		'admin' => 1,
                'phone' => '0599691321', 
                'type' => 1,
                'verified' => 1,
                'verification_token' => null

        	]);


        App\User::create(
            [
                'name' => 'Nour Ziada',
                'email' => 'nour@nour.com',
                'password' => bcrypt('password'),
                'admin' => 0,
                'phone' => '0599691321', 
                'type' => 1,
                'verified' => 1,
                'verification_token' => null

            ]);

        App\User::create(
            [
                'name' => 'Hamza Ahmad',
                'email' => 'hmza@hmza.com',
                'password' => bcrypt('password'),
                'admin' => 0,
                'phone' => '0599691321', 
                'type' => 1,
                'verified' => 0,
                'verification_token' => User::generateVerificationToken(),

            ]);
    }
}
