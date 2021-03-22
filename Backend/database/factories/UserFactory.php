<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory {
	protected $model = User::class;
	private static ?string $password = null;

	public function definition() {
		return [
			'name' => $this->faker->name,
			'email' => $this->faker->unique()->safeEmail,
			'password' => $this->getPassword(),
			'remember_token' => Str::random(10),
		];
	}

	private function getPassword(): string {
		if (is_null(static::$password)) static::$password = Hash::make('12345678');
		return static::$password;
	}
}
