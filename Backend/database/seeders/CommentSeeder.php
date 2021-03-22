<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\CommentFactory;

class CommentSeeder extends Seeder {
	public function run() {
		CommentFactory::new()->count(30)->create();
	}
}
