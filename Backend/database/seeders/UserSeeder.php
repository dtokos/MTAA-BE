<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Factories\UserFactory;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder {
	public function run() {
		$this->seedDefaultUsers();
		$this->seedRandomUsers();
	}

	private function seedDefaultUsers() {
		$now = Carbon::now();
		User::upsert([
			[
				'name' => 'Eugen Ártvy',
				'email' => 'eugen.artvy@example.com',
				'password' => Hash::make('12345678'),
				'profile_image' => UserFactory::getImages()[0],
				'created_at' => $now,
				'updated_at' => $now,
			],
		], ['email'], ['name', 'email', 'password', 'updated_at']);
	}

	private function seedRandomUsers() {
		UserFactory::new()->count(10)->create();
	}
}
