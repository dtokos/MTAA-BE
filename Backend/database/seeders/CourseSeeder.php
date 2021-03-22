<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Enums\Color;
use Carbon\Carbon;

class CourseSeeder extends Seeder {
	public function run() {
		$now = Carbon::now();
		$courses = [];

		foreach ($this->getTitles() as $key => $title)
			$courses[] = [
				'id' => $key + 1,
				'title' => $title,
				'color' => Color::getRandomValue(),
				'created_at' => $now,
				'updated_at' => $now,
			];
		
		Course::upsert($courses, ['id'], ['id', 'title', 'color', 'updated_at']);
	}

	private function getTitles(): array {
		return [
			'OOP',
			'AJ',
			'ADM',
			'MA',
			'MIP',
			'PPI',
			'PRPR',
			'ZOOP',
			'PAM',
			'FYZ',
			'TZIV',
			'ELN',
			'ML1',
			'SPRO',
			'SPAASM',
			'WTECH',
			'DBS',
			'FLP',
			'PSI',
			'PKS',
			'DSA',
			'PIKT',
			'OS',
			'AZA',
			'VAVA',
			'TEAP',
			'PAS',
			'UI',
			'PIB',
			'ICP',
			'PSIP',
			'ME',
			'MSOFT',
			'PARALPR',
			'APC',
			'PIS',
			'MSS',
			'WANT',
			'WPUB',
			'IAU',
			'MBVIT',
			'MIKROP',
			'DM',
			'EIT',
			'FAPS',
			'OPAHZ',
			'PRBIT',
			'BP',
			'VAVJS',
			'MTAA',
			'PAP',
			'BIT',
		];
	}
}
