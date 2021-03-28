<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory {
	protected $model = User::class;
	private static ?string $password = null;
	private static ?array $images = null;

	public function definition() {
		return [
			'name' => $this->faker->name,
			'email' => $this->faker->unique()->safeEmail,
			'password' => $this->getPassword(),
			'profile_image' => $this->faker->randomElement($this->getImages()),
			'remember_token' => Str::random(10),
		];
	}

	private function getPassword(): string {
		if (is_null(static::$password)) static::$password = Hash::make('12345678');
		return static::$password;
	}

	public static function getImages(): array {
		if (is_null(static::$images)) static::$images = static::loadImages();
		return static::$images;
	}

	private static function loadImages() {
		$disk = Storage::disk('resources');
		return array_map(fn($filePath) => 'data:image/jpeg;base64,'. base64_encode($disk->get($filePath)), $disk->files('images/profiles'));
	}
}
