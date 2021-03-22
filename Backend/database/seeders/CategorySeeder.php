<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Enums\Color;
use Carbon\Carbon;

class CategorySeeder extends Seeder {
	public function run() {
		$now = Carbon::now();
		Category::upsert([
			[
				'id' => 1,
				'title' => 'Prednášky',
				'color' => Color::getRandomValue(),
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 2,
				'title' => 'Cvičenia',
				'color' => Color::getRandomValue(),
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 3,
				'title' => 'Zadania',
				'color' => Color::getRandomValue(),
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 4,
				'title' => 'Skúšky',
				'color' => Color::getRandomValue(),
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 5,
				'title' => 'Iné',
				'color' => Color::getRandomValue(),
				'created_at' => $now,
				'updated_at' => $now,
			],
		], ['id'], ['id', 'title', 'color', 'updated_at']);
	}
}
