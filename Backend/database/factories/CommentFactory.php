<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentFactory extends Factory {
	protected $model = Comment::class;
	private static ?array $userIds = null;
	private static ?array $postIds = null;

	public function definition() {
		return [
			'user_id' => $this->faker->randomElement($this->getUserIds()),
			'post_id' => $this->faker->randomElement($this->getPostIds()),
			'content' => $this->faker->paragraph(),
		];
	}

	private function getUserIds(): array {
		if (is_null(static::$userIds)) static::$userIds = User::pluck('id')->toArray();
		return static::$userIds;
	}

	private function getPostIds(): array {
		if (is_null(static::$postIds)) static::$postIds = Post::pluck('id')->toArray();
		return static::$postIds;
	}
}
