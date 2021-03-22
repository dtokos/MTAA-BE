<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
	protected $hidden = [
		'password',
		'remember_token',
	];

	public function posts() {
		return $this->hasMany(\App\Models\Post::class);
	}

	public function comments() {
		return $this->hasMany(\App\Models\Comment::class);
	}
}
