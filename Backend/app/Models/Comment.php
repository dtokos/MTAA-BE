<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
	public function user() {
		return $this->belongsTo(\App\Models\User::class);
	}

	public function post() {
		return $this->belongsTo(\App\Models\Post::class);
	}
}
