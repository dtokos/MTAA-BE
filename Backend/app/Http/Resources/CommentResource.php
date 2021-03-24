<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource {
	public $preserveKeys = true;
	
	public function toArray($_) {
		return [
			'id' => $this->id,
			'user_id' => $this->user_id,
			'post_id' => $this->post_id,
			'content' => $this->content,
			'created_at' => $this->created_at->toIso8601String(),
			'updated_at' => $this->updated_at->toIso8601String(),
		];
	}
}
