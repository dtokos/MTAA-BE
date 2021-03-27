<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider {
	protected $policies = [
		\App\Models\Post::class => \App\Policies\PostsPolicy::class,
		\App\Models\Comment::class => \App\Policies\CommentsPolicy::class,
		\App\Models\User::class => \App\Policies\UsersPolicy::class,
	];

	public function boot() {
		$this->registerPolicies();
	}
}
