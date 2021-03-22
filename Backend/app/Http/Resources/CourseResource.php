<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource {
	public $preserveKeys = true;
	
	public function toArray($_) {
		return [
			'id' => $this->id,
			'title' => $this->title,
			'color' => $this->color->value,
			'created_at' => $this->created_at->toIso8601String(),
			'updated_at' => $this->updated_at->toIso8601String(),
		];
	}
}
