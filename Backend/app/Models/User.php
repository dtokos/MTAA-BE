<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject {
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

	public function getJWTIdentifier() {
		return $this->getKey();
	}

	public function getJWTCustomClaims() {
		return [];
	}
}
