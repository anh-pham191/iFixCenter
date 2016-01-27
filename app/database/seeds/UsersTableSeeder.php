<?php

class UsersTableSeeder extends Seeder {

	public function run() {
		$user = new User;
		$user->firstname = 'tuan';
		$user->lastname = 'anh';
		$user->email = 'tuananh191194@gmail.com';
		$user->password = Hash::make('tuananh94');
		$user->telephone = '5557771234';
		$user->admin = 1;
		$user->save();
	}
}