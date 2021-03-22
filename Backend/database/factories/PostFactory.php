<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;
use App\Models\Course;
use App\Models\Category;

class PostFactory extends Factory {
	protected $model = Post::class;
	private static ?array $userIds = null;
	private static ?array $courseIds = null;
	private static ?array $categoryIds = null;

	public function definition() {
		return [
			'user_id' => $this->faker->randomElement($this->getUserIds()),
			'course_id' => $this->faker->randomElement($this->getCourseIds()),
			'category_id' => $this->faker->randomElement($this->getCategoryIds()),
			'title' => rtrim($this->faker->sentence(3), '.'),
			'content' => $this->faker->paragraph(),
		];
	}

	private function getUserIds(): array {
		if (is_null(static::$userIds)) static::$userIds = User::pluck('id')->toArray();
		return static::$userIds;
	}

	private function getCourseIds(): array {
		if (is_null(static::$courseIds)) static::$courseIds = Course::pluck('id')->toArray();
		return static::$courseIds;
	}

	private function getCategoryIds(): array {
		if (is_null(static::$categoryIds)) static::$categoryIds = Category::pluck('id')->toArray();
		return static::$categoryIds;
	}
}
