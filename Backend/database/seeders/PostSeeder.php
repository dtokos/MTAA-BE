<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\PostFactory;

class PostSeeder extends Seeder {
	public function run() {
		PostFactory::new()->count(20)->create();
	}
}
