<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	public function run() {
		$this->call(\Database\Seeders\UserSeeder::class);
		$this->call(\Database\Seeders\CourseSeeder::class);
		$this->call(\Database\Seeders\CategorySeeder::class);
		$this->call(\Database\Seeders\PostSeeder::class);
		$this->call(\Database\Seeders\CommentSeeder::class);
	}
}
