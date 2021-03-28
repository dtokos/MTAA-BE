<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource {
	public $preserveKeys = true;
	
	public function toArray($_) {
		return [
			'id' => $this->id,
			'name' => $this->name,
			'email' => $this->email,
			'profile_image' => $this->profile_image,
			'created_at' => $this->created_at->toIso8601String(),
			'updated_at' => $this->updated_at->toIso8601String(),
		];
	}
}
