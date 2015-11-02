<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use cobates\Models\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UsersTableSeeder');
	}

}

class UsersTableSeeder extends Seeder {

	public function run() {
		$user = new User;
		$user->firstname = 'andrian';
		$user->lastname = 'martiyanto';
		$user->email = 'andrian.martiyanto@gmail.com';
		$user->password = Hash::make('641987');
		$user->telephone = '085727344444';
		$user->admin = 1;
		$user->save();
	}

}
