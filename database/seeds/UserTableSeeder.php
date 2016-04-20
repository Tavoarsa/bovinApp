<?php

use Illuminate\Database\Seeder;
use BovinApp\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data = array(
			[
				'name' 		=> 'Gustavo', 
				'last_name' => 'Araya', 
				'email' 	=> 'tavo.cr23@gmail.com', 
				'user' 		=> 'tavoarsa',
				'password' 	=> \Hash::make('123456'),
				'type' 		=> 'admin',
				'active' 	=> 1,
				'address' 	=> 'Heredia',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],
			[
				'name' 		=> 'Juan Antonio', 
				'last_name' => 'Araya', 
				'email' 	=> 'tonying16@gmail.com ', 
				'user' 		=> 'tony',
				'password' 	=> \Hash::make('123456'),
				'type' 		=> 'user',
				'active' 	=> 1,
				'address' 	=> 'San Carlos',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],
		);
		User::insert($data);
    }
    
}
