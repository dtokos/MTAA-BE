<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	protected $casts = ['color' => \App\Enums\Color::class];
	
	public function posts() {
		return $this->hasMany(\App\Models\Post::class);
	}
}
