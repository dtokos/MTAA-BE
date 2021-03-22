<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
	public function user() {
		return $this->belongsTo(\App\Models\User::class);
	}

	public function course() {
		return $this->belongsTo(\App\Models\Course::class);
	}

	public function category() {
		return $this->belongsTo(\App\Models\Category::class);
	}

	public function comments() {
		return $this->hasMany(\App\Models\Comment::class);
	}
}
