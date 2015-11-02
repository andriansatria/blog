<?php
namespace Illuminate\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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